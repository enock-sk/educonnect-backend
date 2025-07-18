## Set up instructions
- clone the repository git clone{repository url}
- navigate to the project folder on the terminal cd educonnect-backend
- composer install 
- cp .env.example .env  
## Set up Database on .env 
- php artisan key:generate
- php artisan migrate
- php artisan serve
  