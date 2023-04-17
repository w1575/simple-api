 docker run --rm \
 -u "$(id -u):$(id -g)" \
 -v "$(pwd):/opt" \
 -w /opt \
 laravelsail/php82-composer:latest \
 composer install --ignore-platform-reqs

SAIL='./vendor/bin/sail'

echo $SAIL
$SAIL up -d --build

$SAIL artisan migrate
$SAIL artisan test
