# Déploiement VPS — softyfact.tn + app.softyfact.tn

Guide de déploiement bare-metal sur un VPS Ubuntu 22.04+ avec Nginx + PHP-FPM.

## Architecture

```
                Internet
                   │
        ┌──────────┴──────────┐
        │       Nginx         │
        │   (reverse proxy)   │
        └──────────┬──────────┘
                   │
     ┌─────────────┼─────────────┐
     │                           │
softyfact.tn              app.softyfact.tn
  (public)                   (core ERP)
     │                           │
  PHP-FPM pool            PHP-FPM pool
  softyfact-public        fetora-pro
     │                           │
     └─────────┐   ┌─────────────┘
               │   │
            MySQL 8
         facture_pro (DB)
```

## Prérequis VPS

```bash
# PHP 8.3
sudo apt install php8.3-fpm php8.3-mysql php8.3-xml php8.3-mbstring php8.3-curl php8.3-zip php8.3-gd php8.3-intl php8.3-bcmath

# Nginx
sudo apt install nginx

# MySQL 8
sudo apt install mysql-server

# Node.js 20
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install nodejs

# Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Certbot
sudo apt install certbot python3-certbot-nginx
```

## Étapes de déploiement

### 1. Préparer la base de données

```bash
# Créer l'utilisateur restreint pour le site public
sudo mysql < deploy/mysql-setup.sql
```

> ⚠️ Modifier le mot de passe dans `deploy/mysql-setup.sql` avant d'exécuter !

### 2. Déployer le site public

```bash
sudo bash deploy/deploy-public.sh
```

Puis éditer `/var/www/softyfact-public/.env` :

```env
APP_NAME="SoftyFact"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://softyfact.tn

CORE_APP_URL=https://app.softyfact.tn

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=facture_pro
DB_USERNAME=softyfact_public
DB_PASSWORD=votre_mot_de_passe
```

### 3. Déployer l'app core

```bash
sudo bash deploy/deploy-core.sh
```

Puis éditer `/var/www/fetora-pro/.env` :

```env
APP_URL=https://app.softyfact.tn
PUBLIC_SITE_URL=https://softyfact.tn
```

### 4. Configurer SSL

```bash
# Assurez-vous que les DNS A records pointent vers le VPS
sudo bash deploy/ssl-setup.sh votre-email@example.com
```

### 5. Vérifier

```bash
# Tester Nginx
sudo nginx -t

# Vérifier les pools PHP-FPM
sudo systemctl status php8.3-fpm

# Tester les sites
curl -I https://softyfact.tn
curl -I https://app.softyfact.tn
```

## Structure des fichiers de config

```
deploy/
├── nginx/
│   ├── softyfact.tn.conf        # Vhost site public
│   └── app.softyfact.tn.conf    # Vhost app core
├── php-fpm/
│   ├── softyfact-public.conf    # Pool PHP-FPM (public)
│   └── fetora-pro.conf          # Pool PHP-FPM (core)
├── mysql-setup.sql              # User MySQL restreint
├── deploy-public.sh             # Script déploiement public
├── deploy-core.sh               # Script déploiement core
├── ssl-setup.sh                 # Setup Let's Encrypt
└── DEPLOY.md                    # Ce fichier
```

## Mise à jour

Pour mettre à jour une app après un changement de code :

```bash
# Site public
sudo bash deploy/deploy-public.sh

# App core (met en maintenance, migre, rebuild)
sudo bash deploy/deploy-core.sh
```

## Dépannage

```bash
# Logs Nginx
tail -f /var/log/nginx/softyfact-public.error.log
tail -f /var/log/nginx/fetora-pro.error.log

# Logs PHP-FPM
tail -f /var/log/php-fpm/softyfact-public-error.log
tail -f /var/log/php-fpm/fetora-pro-error.log

# Logs Laravel
tail -f /var/www/softyfact-public/storage/logs/laravel.log
tail -f /var/www/fetora-pro/storage/logs/laravel.log

# Recharger après changement de config
sudo systemctl reload php8.3-fpm
sudo systemctl reload nginx
```
