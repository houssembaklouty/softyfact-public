#!/bin/bash
# ================================================================
# FULL VPS SETUP — softyfact.tn + app.softyfact.tn
# ================================================================
# Fresh Ubuntu 22.04/24.04 VPS → both apps running with SSL
#
# Usage:
#   1. SSH into your fresh VPS as root
#   2. Upload or clone this script
#   3. Run: bash vps-setup.sh
#
# The script will prompt you for:
#   - GitHub SSH key or deploy key
#   - MySQL root password
#   - Email for Let's Encrypt SSL
#   - Domain confirmation
# ================================================================
set -euo pipefail

# ── Run everything as root without warnings ──
export COMPOSER_ALLOW_SUPERUSER=1
export DEBIAN_FRONTEND=noninteractive

# ── Colors ──
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m'

info()  { echo -e "${BLUE}[INFO]${NC} $1"; }
ok()    { echo -e "${GREEN}[OK]${NC} $1"; }
warn()  { echo -e "${YELLOW}[WARN]${NC} $1"; }
err()   { echo -e "${RED}[ERROR]${NC} $1"; }
step()  { echo -e "\n${GREEN}══════════════════════════════════════${NC}"; echo -e "${GREEN}  $1${NC}"; echo -e "${GREEN}══════════════════════════════════════${NC}"; }

# ── Must be root ──
if [ "$(id -u)" -ne 0 ]; then
    err "This script must be run as root. Use: sudo bash vps-setup.sh"
    exit 1
fi

# ================================================================
# CONFIG — Edit these or the script will prompt
# ================================================================
GITHUB_USER="houssembaklouty"
REPO_PUBLIC="softyfact-public"
REPO_CORE="fetora-pro"
DOMAIN_PUBLIC="softyfact.tn"
DOMAIN_CORE="app.softyfact.tn"
DEPLOY_DIR_PUBLIC="/var/www/softyfact-public"
DEPLOY_DIR_CORE="/var/www/fetora-pro"
PHP_VER="8.3"
NODE_VER="20"
DB_NAME="facture_pro"
DB_USER_CORE="facture_user"
DB_USER_PUBLIC="softyfact_public"

# ── Prompt for secrets ──
echo ""
echo "============================================"
echo "  SoftyFact VPS Setup"
echo "  ${DOMAIN_PUBLIC} + ${DOMAIN_CORE}"
echo "============================================"
echo ""

# ── GitHub auth method ──
echo "How do you want to clone from GitHub?"
echo "  1) HTTPS + Personal Access Token (easiest)"
echo "  2) SSH key (will generate one if needed)"
read -rp "Choice [1/2]: " GIT_METHOD
echo ""

GITHUB_CLONE_PREFIX=""
if [[ "$GIT_METHOD" == "1" ]]; then
    read -rp "GitHub Personal Access Token: " GITHUB_TOKEN
    GITHUB_CLONE_PREFIX="https://${GITHUB_TOKEN}@github.com/${GITHUB_USER}"
    # Store token so git pull works later
    git config --global credential.helper store
    echo "https://${GITHUB_USER}:${GITHUB_TOKEN}@github.com" > /root/.git-credentials
    chmod 600 /root/.git-credentials
else
    GITHUB_CLONE_PREFIX="git@github.com:${GITHUB_USER}"
fi

read -rp "MySQL root password (new): " DB_ROOT_PASS
read -rp "MySQL password for '${DB_USER_CORE}' (core app): " DB_PASS_CORE
read -rp "MySQL password for '${DB_USER_PUBLIC}' (public app): " DB_PASS_PUBLIC
read -rp "Email for Let's Encrypt SSL: " SSL_EMAIL
echo ""

info "Domains: ${DOMAIN_PUBLIC} + ${DOMAIN_CORE}"
info "GitHub: ${GITHUB_USER}/${REPO_PUBLIC} + ${GITHUB_USER}/${REPO_CORE}"
info "Auth: $(if [[ "$GIT_METHOD" == "1" ]]; then echo "HTTPS + Token"; else echo "SSH"; fi)"
read -rp "Continue? (y/n) " -n 1 CONFIRM
echo ""
if [[ ! "$CONFIRM" =~ ^[Yy]$ ]]; then
    echo "Aborted."
    exit 0
fi

# ================================================================
# STEP 1 — System Update & Base Packages
# ================================================================
step "1/10 — System Update & Base Packages"

apt-get update -qq
apt-get upgrade -y -qq
apt-get install -y -qq \
    curl wget git unzip software-properties-common \
    ufw fail2ban rsync acl \
    ca-certificates gnupg lsb-release

ok "Base packages installed"

# ================================================================
# STEP 2 — Firewall (UFW)
# ================================================================
step "2/10 — Firewall Setup"

ufw default deny incoming
ufw default allow outgoing
ufw allow OpenSSH
ufw allow 80/tcp
ufw allow 443/tcp
ufw --force enable

ok "Firewall configured (SSH + HTTP + HTTPS)"

# ================================================================
# STEP 3 — PHP 8.3
# ================================================================
step "3/10 — PHP ${PHP_VER}"

add-apt-repository -y ppa:ondrej/php
apt-get update -qq
apt-get install -y -qq \
    php${PHP_VER}-fpm \
    php${PHP_VER}-mysql \
    php${PHP_VER}-xml \
    php${PHP_VER}-mbstring \
    php${PHP_VER}-curl \
    php${PHP_VER}-zip \
    php${PHP_VER}-gd \
    php${PHP_VER}-intl \
    php${PHP_VER}-bcmath \
    php${PHP_VER}-redis \
    php${PHP_VER}-soap \
    php${PHP_VER}-readline

# Remove default www pool
rm -f /etc/php/${PHP_VER}/fpm/pool.d/www.conf

ok "PHP ${PHP_VER} installed"

# ================================================================
# STEP 4 — Nginx
# ================================================================
step "4/10 — Nginx"

apt-get install -y -qq nginx
rm -f /etc/nginx/sites-enabled/default

ok "Nginx installed"

# ================================================================
# STEP 5 — Node.js 20 + Composer
# ================================================================
step "5/10 — Node.js ${NODE_VER} + Composer"

# Node.js
curl -fsSL https://deb.nodesource.com/setup_${NODE_VER}.x | bash -
apt-get install -y -qq nodejs

# Composer
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ok "Node $(node -v) + Composer $(composer -V 2>/dev/null | grep -oP '[\d.]+'| head -1)"

# ================================================================
# STEP 6 — MySQL 8
# ================================================================
step "6/10 — MySQL 8"

apt-get install -y -qq mysql-server

# Secure MySQL
systemctl start mysql
systemctl enable mysql

# Set root password & create databases/users
# Try: no password → provided password → auth_socket (sudo)
MYSQL_CMD=""
if mysql -u root -e "SELECT 1" &>/dev/null; then
    MYSQL_CMD="mysql -u root"
elif mysql -u root -p"${DB_ROOT_PASS}" -e "SELECT 1" &>/dev/null; then
    MYSQL_CMD="mysql -u root -p${DB_ROOT_PASS}"
else
    # Ubuntu default: root uses auth_socket, sudo works
    MYSQL_CMD="mysql"
fi

$MYSQL_CMD <<EOSQL
-- Root password (safe to re-run)
ALTER USER 'root'@'localhost' IDENTIFIED WITH caching_sha2_password BY '${DB_ROOT_PASS}';

-- Database
CREATE DATABASE IF NOT EXISTS \`${DB_NAME}\` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Core app user (full access)
CREATE USER IF NOT EXISTS '${DB_USER_CORE}'@'localhost' IDENTIFIED BY '${DB_PASS_CORE}';
GRANT ALL PRIVILEGES ON \`${DB_NAME}\`.* TO '${DB_USER_CORE}'@'localhost';

-- Public app user (created now, table grants applied after migrations)
CREATE USER IF NOT EXISTS '${DB_USER_PUBLIC}'@'localhost' IDENTIFIED BY '${DB_PASS_PUBLIC}';
GRANT USAGE ON \`${DB_NAME}\`.* TO '${DB_USER_PUBLIC}'@'localhost';

FLUSH PRIVILEGES;
EOSQL

ok "MySQL configured — DB: ${DB_NAME}, Users: ${DB_USER_CORE} + ${DB_USER_PUBLIC}"

# ================================================================
# STEP 7 — Redis (for core app queues/cache)
# ================================================================
step "7/10 — Redis"

apt-get install -y -qq redis-server
systemctl enable redis-server
systemctl start redis-server

ok "Redis running"

# ================================================================
# STEP 8 — Clone & Deploy Both Apps
# ================================================================
step "8/10 — Clone & Deploy Applications"

mkdir -p /var/www /var/log/php-fpm

# ── SSH key setup (only for SSH method) ──
if [[ "$GIT_METHOD" != "1" ]]; then
    if [ ! -f /root/.ssh/id_ed25519 ] && [ ! -f /root/.ssh/id_rsa ]; then
        warn "No SSH key found. Generating one for GitHub..."
        ssh-keygen -t ed25519 -C "vps-deploy@${DOMAIN_PUBLIC}" -f /root/.ssh/id_ed25519 -N ""
        echo ""
        warn "Add this deploy key to BOTH repos on GitHub (Settings → Deploy Keys):"
        echo "──────────────────────────────────────"
        cat /root/.ssh/id_ed25519.pub
        echo "──────────────────────────────────────"
        echo ""
        read -rp "Press ENTER after adding the key to GitHub..."
    fi
    ssh-keyscan github.com >> /root/.ssh/known_hosts 2>/dev/null
fi

# ── Clone repos (clean stale partial installs) ──
if [ -d "${DEPLOY_DIR_PUBLIC}" ] && [ ! -d "${DEPLOY_DIR_PUBLIC}/.git" ]; then
    warn "Removing incomplete ${DEPLOY_DIR_PUBLIC}..."
    rm -rf "${DEPLOY_DIR_PUBLIC}"
fi
if [ ! -d "${DEPLOY_DIR_PUBLIC}" ]; then
    info "Cloning ${REPO_PUBLIC}..."
    git clone "${GITHUB_CLONE_PREFIX}/${REPO_PUBLIC}.git" "${DEPLOY_DIR_PUBLIC}"
else
    info "Updating ${REPO_PUBLIC}..."
    cd "${DEPLOY_DIR_PUBLIC}" && git pull origin main
fi

if [ -d "${DEPLOY_DIR_CORE}" ] && [ ! -d "${DEPLOY_DIR_CORE}/.git" ]; then
    warn "Removing incomplete ${DEPLOY_DIR_CORE}..."
    rm -rf "${DEPLOY_DIR_CORE}"
fi
if [ ! -d "${DEPLOY_DIR_CORE}" ]; then
    info "Cloning ${REPO_CORE}..."
    git clone "${GITHUB_CLONE_PREFIX}/${REPO_CORE}.git" "${DEPLOY_DIR_CORE}"
else
    info "Updating ${REPO_CORE}..."
    cd "${DEPLOY_DIR_CORE}" && git pull origin main
fi

# ──────────────────────────────
# PUBLIC APP — softyfact.tn
# ──────────────────────────────
info "Building softyfact-public..."
cd "${DEPLOY_DIR_PUBLIC}"

# .env
cat > .env <<ENVEOF
APP_NAME=SoftyFact
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://${DOMAIN_PUBLIC}

CORE_APP_URL=https://${DOMAIN_CORE}

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=${DB_NAME}
DB_USERNAME=${DB_USER_PUBLIC}
DB_PASSWORD=${DB_PASS_PUBLIC}

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_COOKIE=softyfact_public_session

CACHE_STORE=file
LOG_CHANNEL=stack

APP_SUPPORT_PHONE="71 000 000"
APP_ORDER_AMOUNT=149
APP_ORDER_AMOUNT_ONLINE=99
ENVEOF

mkdir -p storage/logs storage/framework/{cache/data,sessions,views} bootstrap/cache
composer install --no-dev --optimize-autoloader --no-interaction
npm ci
npm run build
rm -rf node_modules

php artisan key:generate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

chown -R www-data:www-data "${DEPLOY_DIR_PUBLIC}"
chmod -R 755 "${DEPLOY_DIR_PUBLIC}"
chmod -R 775 storage bootstrap/cache

ok "softyfact-public built"

# ──────────────────────────────
# CORE APP — app.softyfact.tn
# ──────────────────────────────
info "Building fetora-pro..."
cd "${DEPLOY_DIR_CORE}"

# .env (only if doesn't exist — don't overwrite existing config)
if [ ! -f .env ]; then
    cp .env.example .env
    # Patch key values
    sed -i "s|APP_ENV=local|APP_ENV=production|" .env
    sed -i "s|APP_DEBUG=true|APP_DEBUG=false|" .env
    sed -i "s|APP_URL=.*|APP_URL=https://${DOMAIN_CORE}|" .env
    sed -i "s|DB_HOST=mysql|DB_HOST=127.0.0.1|" .env
    sed -i "s|DB_USERNAME=.*|DB_USERNAME=${DB_USER_CORE}|" .env
    sed -i "s|DB_PASSWORD=.*|DB_PASSWORD=${DB_PASS_CORE}|" .env
    sed -i "s|REDIS_HOST=redis|REDIS_HOST=127.0.0.1|" .env
    sed -i "s|CACHE_DRIVER=redis|CACHE_DRIVER=redis|" .env
    # Add public site URL
    echo "" >> .env
    echo "PUBLIC_SITE_URL=https://${DOMAIN_PUBLIC}" >> .env

    warn "Review ${DEPLOY_DIR_CORE}/.env — adjust mail, elfatoora, etc."
fi

mkdir -p storage/logs storage/framework/{cache/data,sessions,views} bootstrap/cache
composer install --no-dev --optimize-autoloader --no-interaction
npm ci
npm run build
rm -rf node_modules

php artisan key:generate --force --no-interaction 2>/dev/null || true
php artisan migrate --force
php artisan storage:link 2>/dev/null || true

# Now that tables exist, grant restricted access to public user
info "Applying restricted MySQL grants for ${DB_USER_PUBLIC}..."
mysql -u root -p"${DB_ROOT_PASS}" <<EOSQL2
GRANT SELECT, INSERT, UPDATE ON \`${DB_NAME}\`.\`orders\` TO '${DB_USER_PUBLIC}'@'localhost';
GRANT SELECT, INSERT ON \`${DB_NAME}\`.\`contact_leads\` TO '${DB_USER_PUBLIC}'@'localhost';
GRANT SELECT ON \`${DB_NAME}\`.\`migrations\` TO '${DB_USER_PUBLIC}'@'localhost';
FLUSH PRIVILEGES;
EOSQL2
ok "Public user grants applied"

mkdir -p storage/logs storage/framework/{cache/data,sessions,views} bootstrap/cache
php artisan config:cache
php artisan route:cache
php artisan view:cache

chown -R www-data:www-data "${DEPLOY_DIR_CORE}"
chmod -R 755 "${DEPLOY_DIR_CORE}"
chmod -R 775 storage bootstrap/cache

ok "fetora-pro built"

# ================================================================
# STEP 9 — Server Configs (Nginx + PHP-FPM)
# ================================================================
step "9/10 — Nginx & PHP-FPM Configuration"

# ── PHP-FPM Pools ──
cat > /etc/php/${PHP_VER}/fpm/pool.d/softyfact-public.conf <<'FPMEOF'
[softyfact-public]
user = www-data
group = www-data
listen = /run/php/php8.3-fpm-softyfact-public.sock
listen.owner = www-data
listen.group = www-data
listen.mode = 0660
pm = dynamic
pm.max_children = 10
pm.start_servers = 2
pm.min_spare_servers = 1
pm.max_spare_servers = 4
pm.max_requests = 500
request_terminate_timeout = 30s
php_admin_value[error_log] = /var/log/php-fpm/softyfact-public-error.log
php_admin_flag[log_errors] = on
php_admin_value[display_errors] = off
php_admin_value[open_basedir] = /var/www/softyfact-public/:/tmp/:/var/log/php-fpm/
php_admin_value[disable_functions] = exec,passthru,shell_exec,system,proc_open,popen
php_admin_value[allow_url_fopen] = off
php_admin_value[expose_php] = off
php_admin_value[memory_limit] = 128M
php_admin_value[post_max_size] = 10M
php_admin_value[upload_max_filesize] = 10M
FPMEOF

cat > /etc/php/${PHP_VER}/fpm/pool.d/fetora-pro.conf <<'FPMEOF'
[fetora-pro]
user = www-data
group = www-data
listen = /run/php/php8.3-fpm-fetora-pro.sock
listen.owner = www-data
listen.group = www-data
listen.mode = 0660
pm = dynamic
pm.max_children = 30
pm.start_servers = 5
pm.min_spare_servers = 3
pm.max_spare_servers = 10
pm.max_requests = 500
request_terminate_timeout = 120s
php_admin_value[error_log] = /var/log/php-fpm/fetora-pro-error.log
php_admin_flag[log_errors] = on
php_admin_value[display_errors] = off
php_admin_value[open_basedir] = /var/www/fetora-pro/:/tmp/:/var/log/php-fpm/
php_admin_value[expose_php] = off
php_admin_value[memory_limit] = 512M
php_admin_value[post_max_size] = 50M
php_admin_value[upload_max_filesize] = 50M
php_admin_value[max_execution_time] = 120
FPMEOF

# ── Nginx — HTTP-only first (for Certbot) ──
cat > /etc/nginx/sites-available/softyfact.tn <<'NGXEOF'
server {
    listen 80;
    listen [::]:80;
    server_name softyfact.tn www.softyfact.tn;
    root /var/www/softyfact-public/public;
    index index.php;

    location ~ /\. { deny all; return 404; }

    location ~ \.php$ {
        location ~ ^/index\.php$ {
            fastcgi_pass unix:/run/php/php8.3-fpm-softyfact-public.sock;
            fastcgi_index index.php;
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        }
        return 404;
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
}
NGXEOF

cat > /etc/nginx/sites-available/app.softyfact.tn <<'NGXEOF'
server {
    listen 80;
    listen [::]:80;
    server_name app.softyfact.tn;
    root /var/www/fetora-pro/public;
    index index.php;

    client_max_body_size 50M;

    location ~ /\. { deny all; return 404; }

    location ~ \.php$ {
        location ~ ^/index\.php$ {
            fastcgi_pass unix:/run/php/php8.3-fpm-fetora-pro.sock;
            fastcgi_index index.php;
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_read_timeout 120;
        }
        return 404;
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location /storage {
        alias /var/www/fetora-pro/storage/app/public;
    }
}
NGXEOF

ln -sf /etc/nginx/sites-available/softyfact.tn /etc/nginx/sites-enabled/
ln -sf /etc/nginx/sites-available/app.softyfact.tn /etc/nginx/sites-enabled/

# Kill anything on port 80 (Apache, old Nginx, etc.)
if command -v fuser &>/dev/null; then
    fuser -k 80/tcp 2>/dev/null || true
fi
# Stop Apache if installed
systemctl stop apache2 2>/dev/null || true
systemctl disable apache2 2>/dev/null || true

# Ensure PHP-FPM log dir exists and restart FPM first (so sockets are created)
mkdir -p /var/log/php-fpm
systemctl restart php${PHP_VER}-fpm
sleep 2

# Verify FPM sockets exist
if [ ! -S /run/php/php8.3-fpm-softyfact-public.sock ] || [ ! -S /run/php/php8.3-fpm-fetora-pro.sock ]; then
    warn "PHP-FPM sockets not found — checking status:"
    systemctl status php${PHP_VER}-fpm --no-pager || true
fi

# Test & start Nginx
nginx -t
systemctl restart nginx

if systemctl is-active --quiet nginx; then
    ok "Nginx + PHP-FPM running (HTTP only — SSL next)"
else
    warn "Nginx failed to start — debug:"
    journalctl -xeu nginx.service --no-pager | tail -20
    systemctl status nginx --no-pager || true
fi

# ================================================================
# STEP 10 — SSL (Let's Encrypt)
# ================================================================
step "10/10 — SSL Certificates"

apt-get install -y -qq certbot python3-certbot-nginx

info "Requesting certificate for ${DOMAIN_PUBLIC}..."
certbot --nginx \
    -d ${DOMAIN_PUBLIC} \
    -d www.${DOMAIN_PUBLIC} \
    --non-interactive \
    --agree-tos \
    --email "${SSL_EMAIL}" \
    --redirect \
    || warn "SSL for ${DOMAIN_PUBLIC} failed — check DNS A record"

info "Requesting certificate for ${DOMAIN_CORE}..."
certbot --nginx \
    -d ${DOMAIN_CORE} \
    --non-interactive \
    --agree-tos \
    --email "${SSL_EMAIL}" \
    --redirect \
    || warn "SSL for ${DOMAIN_CORE} failed — check DNS A record"

# ── Enhance Nginx with full production config after SSL ──
# Certbot modifies the vhosts to add SSL blocks automatically
# Add security headers to the SSL blocks
for CONF in /etc/nginx/sites-available/softyfact.tn /etc/nginx/sites-available/app.softyfact.tn; do
    if ! grep -q "Strict-Transport-Security" "$CONF" 2>/dev/null; then
        sed -i '/ssl_dhparam\|managed by Certbot/a \    # Security Headers\n    add_header Strict-Transport-Security "max-age=31536000; includeSubDomains" always;\n    add_header X-Frame-Options "SAMEORIGIN" always;\n    add_header X-Content-Type-Options "nosniff" always;\n    add_header X-XSS-Protection "1; mode=block" always;\n    add_header Referrer-Policy "strict-origin-when-cross-origin" always;' "$CONF" 2>/dev/null || true
    fi
done

# Add gzip to nginx.conf if not already present
if ! grep -q "gzip_types" /etc/nginx/nginx.conf; then
    sed -i '/http {/a \\n\t# Gzip\n\tgzip on;\n\tgzip_vary on;\n\tgzip_min_length 1024;\n\tgzip_types text/plain text/css application/json application/javascript text/xml application/xml image/svg+xml;' /etc/nginx/nginx.conf
fi

nginx -t && systemctl reload nginx

ok "SSL certificates installed + auto-renewal enabled"

# ================================================================
# DONE
# ================================================================
echo ""
echo -e "${GREEN}══════════════════════════════════════════════════${NC}"
echo -e "${GREEN}  ✅  VPS SETUP COMPLETE!${NC}"
echo -e "${GREEN}══════════════════════════════════════════════════${NC}"
echo ""
echo "  🌐  Public site:  https://${DOMAIN_PUBLIC}"
echo "  🔒  Core app:     https://${DOMAIN_CORE}"
echo ""
echo "  📁  Files:"
echo "      ${DEPLOY_DIR_PUBLIC}"
echo "      ${DEPLOY_DIR_CORE}"
echo ""
echo "  🗄️  Database: ${DB_NAME}"
echo "      Core user: ${DB_USER_CORE}"
echo "      Public user: ${DB_USER_PUBLIC}"
echo ""
echo "  ⚠️  TODO:"
echo "      1. Edit ${DEPLOY_DIR_CORE}/.env (mail, elfatoora, etc.)"
echo "      2. Test: curl -I https://${DOMAIN_PUBLIC}"
echo "      3. Test: curl -I https://${DOMAIN_CORE}"
echo "      4. Run: certbot renew --dry-run"
echo ""
echo "  📋  Useful commands:"
echo "      systemctl status nginx"
echo "      systemctl status php${PHP_VER}-fpm"
echo "      tail -f /var/log/nginx/*.error.log"
echo "      tail -f /var/www/*/storage/logs/laravel.log"
echo ""
