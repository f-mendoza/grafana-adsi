#!/bin/bash

if [[ ! -d vendor ]]; then
    composer install
fi

if [[ ! -f /app/.env ]]; then
    cp .env.example .env
    php artisan key:generate
    php artisan migrate -q
fi

if [[ -d /app/public ]]; then
    if [[ ! -d /var/www/html ]]; then
        ln -s /app/public /var/www/html
    fi
fi

if [[ -d /app/storage ]]; then
    chown www-data:www-data -R /app/storage
fi

if [[ -d /app/database ]]; then
    chown www-data:www-data -R /app/database
fi

if [[ -d /app/bootstrap ]]; then
    chown www-data:www-data -R /app/bootstrap
fi

apache2-foreground