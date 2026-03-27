#!/bin/bash
# ============================================
# VPS Deploy Script — fetora-pro (core app)
# Updates the core app at /var/www/fetora-pro
# ============================================
# Usage: sudo bash deploy/deploy-core.sh
set -euo pipefail

APP_NAME="fetora-pro"
DEPLOY_DIR="/var/www/${APP_NAME}"
REPO_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PHP_VER="8.3"

echo "=========================================="
echo "  Deploying ${APP_NAME} (core ERP)"
echo "=========================================="

# ── 1. Maintenance mode ──
echo "[1/8] Entering maintenance mode..."
cd "${DEPLOY_DIR}" 2>/dev/null && php artisan down --retry=30 || true

# ── 2. Sync files ──
echo "[2/8] Syncing files to ${DEPLOY_DIR}..."
rsync -av --delete \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='.env' \
    --exclude='deploy' \
    --exclude='storage/logs/*' \
    --exclude='storage/framework/cache/data/*' \
    --exclude='storage/framework/sessions/*' \
    --exclude='storage/framework/views/*' \
    --exclude='storage/app/*' \
    --exclude='db/*' \
    "${REPO_DIR}/" "${DEPLOY_DIR}/"

# ── 3. Install dependencies ──
echo "[3/8] Installing Composer dependencies..."
cd "${DEPLOY_DIR}"
composer install --no-dev --optimize-autoloader --no-interaction

# ── 4. Build frontend ──
echo "[4/8] Building frontend assets..."
npm ci --production=false
npm run build
rm -rf node_modules

# ── 5. Database migrations ──
echo "[5/8] Running migrations..."
php artisan migrate --force

# ── 6. Laravel caches ──
echo "[6/8] Caching config/routes/views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ── 7. Install Nginx & PHP-FPM configs ──
echo "[7/8] Installing server configs..."
cp "${REPO_DIR}/deploy/nginx/app.softyfact.tn.conf" /etc/nginx/sites-available/app.softyfact.tn
ln -sf /etc/nginx/sites-available/app.softyfact.tn /etc/nginx/sites-enabled/app.softyfact.tn

cp "${REPO_DIR}/deploy/php-fpm/fetora-pro.conf" "/etc/php/${PHP_VER}/fpm/pool.d/fetora-pro.conf"

nginx -t
systemctl reload "php${PHP_VER}-fpm"
systemctl reload nginx

# ── 8. Go live ──
echo "[8/8] Exiting maintenance mode..."
php artisan up

echo ""
echo "=========================================="
echo "  ✅ ${APP_NAME} deployed successfully!"
echo "=========================================="
