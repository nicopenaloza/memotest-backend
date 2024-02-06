# Memotest Backend - Installation Guide

## Prerequisites

Make sure you have the following components installed before starting:

- [Xampp](https://www.apachefriends.org/index.html) (Mysql & Apache)
- [Node](https://nodejs.org/) 20.10 & [Npm](https://www.npmjs.com/)
- [PHP](https://www.php.net/) 8.3.2
- [Composer](https://getcomposer.org/) v2.6.6
- [Git](https://git-scm.com/)

## Installation Steps

1. Enable the Mysql & Apache services in Xampp.

2. Access http://localhost/phpmyadmin/ and create a new database named 'memotest'.

3. Clone the repository from GitHub:

    ```bash
    git clone https://github.com/nicopenaloza/memotest-backend.git
    ```

4. Inside the repository folder, open a terminal and execute the following commands:

    ```bash
    powershell
    composer install
    cp .env.example .env
    ```

5. Open the `.env` file with a text editor and paste the following configuration:

    ```env
    APP_NAME=Memotest
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack
    LOG_DEPRECATIONS_CHANNEL=null
    LOG_LEVEL=debug

    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=memotest
    DB_USERNAME=root
    DB_PASSWORD=

    APP_SERVICE=api.local

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    FILESYSTEM_DISK=local
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    MEMCACHED_HOST=127.0.0.1

    REDIS_HOST=127.0.0.1
    REDIS_PASSWORD=null
    REDIS_PORT=6379

    MAIL_MAILER=smtp
    MAIL_HOST=mailpit
    MAIL_PORT=1025
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"

    AWS_ACCESS_KEY_ID=
    AWS_SECRET_ACCESS_KEY=
    AWS_DEFAULT_REGION=us-east-1
    AWS_BUCKET=
    AWS_USE_PATH_STYLE_ENDPOINT=false

    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_HOST=
    PUSHER_PORT=443
    PUSHER_SCHEME=https
    PUSHER_APP_CLUSTER=mt1

    VITE_APP_NAME="${APP_NAME}"
    VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
    VITE_PUSHER_HOST="${PUSHER_HOST}"
    VITE_PUSHER_PORT="${PUSHER_PORT}"
    VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
    VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
    ```

6. Save and close the `.env` file.

7. Run the command to migrate the database:

    ```bash
    php artisan migrate
    ```

8. Then, start the server:

    ```bash
    php artisan serve
    ```

Now, the Memotest backend should be up and running at http://localhost:8000/graphiql.
