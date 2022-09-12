**Тестовое задание для Growfood** 

<p>Контроллер - app/Http/Controllers/OrderController.php</p>
<p>Модели - app/Models/</p>
<p>Сервис - app/Services/</p>
<p>Реквесты - app/Http/Requests</p>

### Project setup

1. Copy .env.dist to .env to setup docker variables

   	HOST_USER=1000:1000
   	DATABASE_USER=TEST
   	DATABASE_PASSWORD=password
   	DATABASE_NAME=tema
   	DATABASE_CONTAINER_NAME=localdb

2. Run

   	docker-compose build
   	docker-compose up -d

3. Go inside php-fpm container and install composer dependencies

   	docker-compose exec php-fpm bash
   	composer install

5. Inside php-fpm container run

   	php artisan migrate:refresh --seed

## Getting with Curl

```
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X GET http://127.0.0.1:8093/
    $ curl -H 'content-type: application/json' -H 'Accept: application/json' -v -X POST -d'{"address": "Khabarovsk, Sheronova bulvar, 59", "name": "Baron", "phone": "9098249090", "tarif": 1, "delivery_day": 1}' http://127.0.0.1:8093/create
```

