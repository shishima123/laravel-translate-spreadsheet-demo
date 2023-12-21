# Installing

## Setup Sail

#### Run app

    sail up

#### Create .env

    cp .env.example .env

#### Key generate

    sail php artisan key:generate

#### Run After clone first

    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
