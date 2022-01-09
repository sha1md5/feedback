## Setup
- Install [https://www.docker.com](https://www.docker.com).
- In cmd navigate to project root folder and execute ```./vendor/bin/sail up```
- After Sail conteiners are up and running execute:
```
./vendor/bin/sail composer install
./vendor/bin/sail npm install
./vendor/bin/sail npm run
./vendor/bin/sail php artisan migrate
./vendor/bin/sail php artisan db:seed
```
