#!/bin/bash

docker exec -it app composer create-project --prefer-dist laravel/laravel laravel-project "6.*"
docker exec -it app chmod -R 777 laravel-project/storage
