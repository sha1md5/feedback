## Setup
- Install [https://www.docker.com](https://www.docker.com).
- Navigate to project root directory in CMD
- Create .env file ``` cp .env.example .env ```
- Install Composer Dependencies:
```shell
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/var/www/html \
-w /var/www/html \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```
- Start Laravel Sail containers ``` ./vendor/bin/sail up ```
- After Sail conteiners are up and running execute:
```shell
./vendor/bin/sail composer install
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
./vendor/bin/sail php artisan migrate
./vendor/bin/sail php artisan db:seed
```
