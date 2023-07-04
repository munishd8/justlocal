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

* Verify Api (api/v1/auth/verify)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/verify
fields : 
* email
* otp
``````````

* Reset Otp Api (api/v1/auth/reset-verify)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/reset-verify
fields : 
* email
``````````
````````````
Run the below artisan command to add job table for Mail.

php artisan queue:table
php artisan migrate
````````````
* Forgot Password Api (api/v1/auth/forgot-password)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/forgot-password
fields : 
* email
``````````
* Reset Forgot Password Api (api/v1/auth/reset-forgot-password)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/reset-forgot-password
fields : 
* email
``````````

* Generate New Password Api (api/v1/auth/new-password)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/new-password
fields : 
* email
* Password
* password_confirmation
``````````

* Logout  Api (api/v1/auth/logout)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/logout
fields : 

* token eg: Bearer 18|jOB2pyAI4dTi1zKsF25PvZZ5DnG9P2N6VQBz0Bpm
``````````
* Change Password  Api (api/v1/auth/change-password)
`````````
url testing : http://127.0.0.1:8000/api/v1/auth/change-password
fields : 
* current_password
* password
* password_confirmation
* token eg: Bearer 18|jOB2pyAI4dTi1zKsF25PvZZ5DnG9P2N6VQBz0Bpm
``````````