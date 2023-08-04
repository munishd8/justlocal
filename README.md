# Just local

# Usage
Setup Repo

`````````

git clone https://github.com/munishd8/justlocal.git
cd justlocal
composer install
cp .env.example .env 
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan cache:clear && php artisan config:clear 
php artisan serve
npm install
npm run dev
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

* Posts Categories  Api (api/v1/posts/categories)
`````````
url testing : http://127.0.0.1:8000/api/v1/posts/categories

``````````

* Directory Listings Categories  Api (api/v1/posts/directory-listings/categories)
`````````
url testing : http://127.0.0.1:8000/api/v1/directory-listings/categories

``````````

* Directory locations  Api (api/v1/directory-listings/locations)
`````````
url testing : http://127.0.0.1:8000/api/v1/directory-listings/locations

``````````

* Death Notices  Api (api/v1/death-notices)
`````````
url testing : http://127.0.0.1:8000/api/v1/death-notices

``````````

* Local Eats   Api (api/v1/local-eats)
`````````
url testing : http://127.0.0.1:8000/api/v1/local-eats

``````````

* Planning Applications  Api (api/v1/planning-applications)
`````````
url testing : http://127.0.0.1:8000/api/v1/planning-applications

``````````

* Restaurants  Api (api/v1/posts/restaurants)
`````````
url testing : http://127.0.0.1:8000/api/v1/restaurants

``````````

* Transports  Api (api/v1/posts/transports)
`````````
url testing : http://127.0.0.1:8000/api/v1/transports

``````````
