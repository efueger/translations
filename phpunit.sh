#!/usr/bin/env sh

php artisan migrate:refresh
php artisan db:seed
DB_PASSWORD=root1232  vendor/phpunit/phpunit/phpunit