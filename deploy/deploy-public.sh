#!/bin/bash
# ============================================
# VPS Deploy Script — softyfact-public
# Deploys the public site to /var/www/softyfact-public
# ============================================
# Usage: sudo bash deploy/deploy-public.sh
set -euo pipefail

APP_NAME="softyfact-public"
DEPLOY_DIR="/var/www/${APP_NAME}"
REPO_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PHP_VER="8.3"

echo "=========================================="
echo "  Deploying ${APP_NAME}"
echo "=========================================="

# ── 1. Create directories ──
echo "[1/9] Creating directories..."
mkdir -p "${DEPLOY_DIR}"
mkdir -p /var/log/php-fpm

# ── 2. Sync files ──
echo "[2/9] Syncing files to ${DEPLOY_DIR}..."
rsync -av --delete \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='.env' \
    --exclude='deploy' \
    --exclude='storage/logs/*' \
    --exclude='storage/framework/cache/data/*' \
    --exclude='storage/framework/sessions/*' \
    --exclude='storage/framework/views/*' \
    "${REPO_DIR}/" "${DEPLOY_DIR}/"

# ── 3. Install PHP dependencies ──
echo "[3/9] Installing Composer dependencies..."
cd "${DEPLOY_DIR}"
composer install --no-dev --optimize-autoloader --no-interaction

# ── 4. Install JS dependencies & build ──
echo "[4/9] Building frontend assets..."
npm ci --production=false
npm run build
rm -rf node_modules

# ── 5. Environment file ──
if [ ! -f "${DEPLOY_DIR}/.env" ]; then
    echo "[5/9] Creating .env from .env.example..."
    cp "${DEPLOY_DIR}/.env.example" "${DEPLOY_DIR}/.env"
    php artisan key:generate --force
    echo "⚠️  IMPORTANT: Edit ${DEPLOY_DIR}/.env with your production values!"
else
    echo "[5/9] .env already exists, skipping..."
fi

# ── 6. Laravel setup ──
echo "[6/9] Running Laravel setup..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ── 7. Directory structure & permissions ──
echo "[7/9] Setting permissions..."
mkdir -p storage/logs storage/framework/{cache/data,sessions,views}
mkdir -p bootstrap/cache
chown -R www-data:www-data "${DEPLOY_DIR}"
chmod -R 755 "${DEPLOY_DIR}"
chmod -R 775 storage bootstrap/cache

# ── 8. Install Nginx & PHP-FPM configs ──
echo "[8/9] Installing server configs..."
cp "${REPO_DIR}/deploy/nginx/softyfact.tn.conf" /etc/nginx/sites-available/softyfact.tn
ln -sf /etc/nginx/sites-available/softyfact.tn /etc/nginx/sites-enabled/softyfact.tn

cp "${REPO_DIR}/deploy/php-fpm/softyfact-public.conf" "/etc/php/${PHP_VER}/fpm/pool.d/softyfact-public.conf"

# ── 9. Reload services ──
echo "[9/9] Reloading services..."
nginx -t
systemctl reload "php${PHP_VER}-fpm"
systemctl reload nginx

echo ""
echo "=========================================="
echo "  ✅ ${APP_NAME} deployed successfully!"
echo "=========================================="
echo ""
echo "Next steps:"
echo "  1. Edit ${DEPLOY_DIR}/.env with production DB credentials"
echo "  2. Run: sudo bash deploy/ssl-setup.sh"
echo "  3. Run: sudo mysql < deploy/mysql-setup.sql"
echo ""
