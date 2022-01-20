# Приложение Quiz

[Ссылка на общее описание тестовое задания](https://yadi.sk/i/F4eBBIin1a4AZA)

### Команды Docker'а
Чтобы поднять приложение
```sh
docker-compose up -d
```
После запуска приложения выполнить
```sh
docker-compose exec app php artisan migrate
docker-compose exec app php artisan DB:seed
```
Чтобы  выполнить тесты
```sh
docker-compose exec app php artisan test
```
