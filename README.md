1 clone the repository
cd educonnect-backend
 composer install 
cp .env.example .env  

php artisan key:generate

 edit the env  to configure your database and password for it
  php artisan migrate
  Php artisan serve
  