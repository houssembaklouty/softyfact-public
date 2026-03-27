#!/bin/bash
# ============================================
# SSL Setup — Let's Encrypt for both domains
# ============================================
# Usage: sudo bash deploy/ssl-setup.sh
# Prerequisites: DNS A records for softyfact.tn and app.softyfact.tn
#                must point to this server's IP.
set -euo pipefail

EMAIL="${1:-}"

if [ -z "${EMAIL}" ]; then
    echo "Usage: sudo bash deploy/ssl-setup.sh your-email@example.com"
    exit 1
fi

echo "=========================================="
echo "  SSL Setup — Let's Encrypt"
echo "=========================================="

# ── Install certbot ──
echo "[1/4] Installing Certbot..."
apt-get update -qq
apt-get install -y certbot python3-certbot-nginx

# ── Temporarily use HTTP-only Nginx configs ──
# Certbot needs port 80 accessible with server_name matching
echo "[2/4] Obtaining certificate for softyfact.tn..."
certbot certonly --nginx \
    -d softyfact.tn \
    -d www.softyfact.tn \
    --non-interactive \
    --agree-tos \
    --email "${EMAIL}"

echo "[3/4] Obtaining certificate for app.softyfact.tn..."
certbot certonly --nginx \
    -d app.softyfact.tn \
    --non-interactive \
    --agree-tos \
    --email "${EMAIL}"

# ── Reload Nginx with SSL ──
echo "[4/4] Reloading Nginx..."
nginx -t && systemctl reload nginx

echo ""
echo "=========================================="
echo "  ✅ SSL certificates installed!"
echo "=========================================="
echo ""
echo "Auto-renewal is enabled via certbot timer."
echo "Test renewal: sudo certbot renew --dry-run"
