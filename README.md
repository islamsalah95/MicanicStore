to run project please follow steps below
1- composer install
2-npm install
3-cp .env.example .env
4-php artisan key:generate
5-go to .env file and replace code expect 
{
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:bTJ0KgEoFpd8rLHTzhxTSM+nRlWVqEAb37ytV2s5oqU=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug
}

code must replace ===+++++++++++++++++++++++++++>>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=car3
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=pusher
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=465 
MAIL_USERNAME=4e3ce865e3f652
MAIL_PASSWORD=bf276736c73b55
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=Micanic@gmail.com
MAIL_FROM_NAME="${APP_NAME}"



AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=1558395
PUSHER_APP_KEY=74b3ee488d87f739442a
PUSHER_APP_SECRET=bc535c1146704f81fc15
PUSHER_APP_CLUSTER=mt1


MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
STRIPE_SECRET=sk_test_51L3vAFJ7xRuKEENl23o91YyHjMTdo3mn7oeUUMbJD1V3aCDJ99YU9OJkLa8IBLX0eybTWog16xxTFcbb2lpsnWRM00dZUnSB4o
***************************************************************************************************************************************
then those 2 commands to run project every time 
1-php artisan serve
2-npm run watch


