# Запуск
1. docker-compose up -d
2. docker-compose exec -u www-data php-fpm bash
3. php artisan migrate --seed
4. php artisan queue:work

Запросы на количество авторизированных/неавторизированных просмотров
по дням:
```postgresql
select 
  to_char(date_trunc('day', pvl."created_at"), 'MM-DD') as day_of_month,
  sum(case when pvl."user_id" notnull then 1 else 0 end) as authorized_users_views,
  sum(case when pvl."user_id" isnull then 1 else 0 end) as unauthorized_users_views
from page_view_logs pvl
group by date_trunc('day', pvl."created_at");
```

по месяцам
```postgresql
select 
  to_char(date_trunc('month', pvl."created_at"), 'MM-YYYY') as month_of_year,
  sum(case when pvl."user_id" notnull then 1 else 0 end) as authorized_users_views,
  sum(case when pvl."user_id" isnull then 1 else 0 end) as unauthorized_users_views
from page_view_logs pvl
group by date_trunc('month', pvl."created_at");
```

Комментарий касательно выбора "способа реализации асинхронности":
> В данной конкретной ситуации разницы по-сути вообще не будет.
> Я лично исходил из концепции "ты используешь job если тебе просто что-то нужно сдеать на фоне
> и event-listener, если нужно отреагировать на дейсвтия пользователя."