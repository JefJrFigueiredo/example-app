# Example project using Laravel 10, MySQL 8 and Docker

## Requirements
- [Docker](https://docs.docker.com/engine/install/) and [Docker Compose](https://docs.docker.com/compose/install/)
- [VSCode](https://code.visualstudio.com/download)
- VSCode extension: Dev Containers
- If needed, use the convenience scripts of [this repository](https://github.com/JefJrFigueiredo/sh-for-dev-env/tree/main) to configure the Github SSH and install Docker in a Linux or WSL2

## Setup
- Open the Terminal and clone this repository
~~~shell
git clone git@github.com:JefJrFigueiredo/example-app.git
~~~
- Enter the repository
~~~shell
cd example-app
~~~
- Create the .env file
~~~shell
cp .env.example .env
~~~
- Use the following [command](https://laravel.com/docs/10.x/sail#installing-composer-dependencies-for-existing-projects) for installing dependencies:
~~~shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
~~~
- Open this folder in VSCode and reopen in container (Dev Container Extension is needed).
~~~shell
code .
~~~
Once the container is up and running, generate the app_key in one of those two options:

 - Option 1, in WSL: 
~~~shell
./vendor/bin/sail artisan key:generate
~~~
 - Option 2, inside the Sail container:
~~~shell
php artisan key:generate
~~~
Run [http://localhost](http://localhost) in browser to see Laravel welcome page.

To connect a database client (like [MySQL Workbench](https://dev.mysql.com/downloads/workbench/) for example) with the database server container, use the following parameters on the database client:
- Host: localhost (or 127.0.0.1)
- Port: 3306
- User: sail
- Password: password
