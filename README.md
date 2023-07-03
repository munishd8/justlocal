# Just local

# Usage
Setup Repo

`````````

git clone https://github.com/munishd8/justlocal.git
cd justlocal
composer install
cp .env.example .env 
php artisan key:generate
php artisan migrate --seed
php artisan cache:clear && php artisan config:clear 
php artisan serve
npm install
npm run dev
````````` 
# Dynamic Menu
Posts System, Death Notices etc.

`````````

php artisan migrate
php artisan db:seed MenuSeeder
````````` 


# Api Creation -- For Front End
* Login Api (api/v1/auth/login)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/login
fields : 
* email
* password
``````````
* Register Api (api/v1/auth/register)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/register
fields : 
* name
* email
* Password
* password_confirmation
NOTE: User will get 4 digit otp in email.
``````````