#!/bin/bash
# ================================================================
# UPDATE SCRIPT — Redeploy both apps after code changes
# ================================================================
# Usage: sudo bash vps-update.sh [public|core|all]
#   sudo bash vps-update.sh          → updates both
#   sudo bash vps-update.sh public   → updates softyfact-public only
#   sudo bash vps-update.sh core     → updates fetora-pro only
# ================================================================
set -euo pipefail

PHP_VER="8.3"
TARGET="${1:-all}"

RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m'

info()  { echo -e "${BLUE}[INFO]${NC} $1"; }
ok()    { echo -e "${GREEN}[OK]${NC} $1"; }

if [ "$(id -u)" -ne 0 ]; then
    echo -e "${RED}[ERROR]${NC} Run as root: sudo bash vps-update.sh"
    exit 1
fi

# ──────────────────────────────
# Update Public Site
# ──────────────────────────────
update_public() {
    echo ""
    info "═══ Updating softyfact-public ═══"

    cd /var/www/softyfact-public
    git pull origin main

    composer install --no-dev --optimize-autoloader --no-interaction
    npm ci
    npm run build
    rm -rf node_modules

    php artisan config:cache
    php artisan route:cache
    php artisan view:cache

    chown -R www-data:www-data /var/www/softyfact-public
    chmod -R 775 storage bootstrap/cache

    ok "softyfact-public updated"
}

# ──────────────────────────────
# Update Core App
# ──────────────────────────────
update_core() {
    echo ""
    info "═══ Updating fetora-pro ═══"

    cd /var/www/fetora-pro
    php artisan down --retry=30

    git pull origin main

    composer install --no-dev --optimize-autoloader --no-interaction
    npm ci
    npm run build
    rm -rf node_modules

    php artisan migrate --force
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache

    chown -R www-data:www-data /var/www/fetora-pro
    chmod -R 775 storage bootstrap/cache

    php artisan up

    ok "fetora-pro updated"
}

# ──────────────────────────────
# Execute
# ──────────────────────────────
case "$TARGET" in
    public) update_public ;;
    core)   update_core ;;
    all)    update_public; update_core ;;
    *)      echo "Usage: sudo bash vps-update.sh [public|core|all]"; exit 1 ;;
esac

# Reload services
systemctl reload php${PHP_VER}-fpm
systemctl reload nginx

echo ""
ok "Deploy complete! Services reloaded."
