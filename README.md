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

