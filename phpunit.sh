#!/usr/bin/env sh

php artisan migrate:refresh
php artisan db:seed
vendor/phpunit/phpunit/phpunit