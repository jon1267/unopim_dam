#!/bin/bash

LOCK_FILE="/var/lock/unopim.lock"

if [ ! -f "$LOCK_FILE" ]; then
    composer install
    npm install
    php artisan unopim:install -n
    
    touch "$LOCK_FILE"
fi

chown -R 1001:1001 /var/www/html

# Hand back control to the default entrypoint
apache2-foreground
