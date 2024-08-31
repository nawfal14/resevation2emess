## Setup project
php artisan migrate
php artisan db:seed

## Seeder
php artisan db:seed --class=TypeSeeder
php artisan db:seed --class=LocalitySeeder
php artisan db:seed --class=UserSeeder

php artisan db:seed --class=ArtistSeeder
php artisan db:seed --class=LocationSeeder
php artisan db:seed --class=ShowSeeder

php artisan db:seed --class=ArtistShowSeeder
php artisan db:seed --class=ArtisteTypeShowSeeder
php artisan db:seed --class=RepresentationSeeder

or:

php artisan db:seed

## Create a seeder
php artisan make:seeder ArtistShowSeeder

## Clear App
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear

# Clear Composer
composer dump-autoload

# Installer le project
composer install or composer update