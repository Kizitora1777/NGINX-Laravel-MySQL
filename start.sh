#!/bin/bash

if [ ! -d "laravel-project" ]; then
	docker exec -it app composer create-project --prefer-dist laravel/laravel laravel-project "6.*"
fi

docker exec -it app chmod -R 777 laravel-project/storage
docker exec -it app chmod -R 777 laravel-project/bootstrap/cache
docker exec -it app /bin/bash -c "cd /var/www/laravel-project && php artisan migrate"