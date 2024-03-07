# Mpstats product parser

Для работы на машине требуется Docker и Docker-compose

### Установка
Из корня проекта выполнить:
```sh
cp .env.example .env

docker-compose up -d
docker-compose run composer
docker-compose run artisan migrate

```
Возможно потребуется дать 755 права на папку storage в проекте

Если все установлено верно, то можно будет работать с проектом:
```
Команда сбора товаров - docker-compose run app:collect-products-by-search
Api endpoint - localhost:8000/api/wildberries/products-by-search?q=джинсы
```
