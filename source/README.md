# Запуск
1. docker-compose up -d
2. docker-compose exec -u www-data php-fpm bash
3. php artisan migrate --seed
4. php artisan queue:work
