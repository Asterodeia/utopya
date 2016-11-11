cat .env.example > .env;
composer self-update;
composer install;
php artisan key:generate;
php artisan config:clear;
php artisan migrate:refresh --seed;
sudo npm install -g gulp-cli;
npm install;