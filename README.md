# Event Participant Management 

API-приложение для управления участниками мероприятия
Реализован на Laravel.


## Приступая к работе

Установить laravel.
Для удобвства работы с API удобно использовать программу Postman.
Для работы на клиенте ставим в заголовке(Headers): 

    Accept : application/json

Чтобы работать с Api нужно завести пользователя и получить токен доступа.
Пример, с помощью POST запроса отправляем json, адрес http://event-participant-management-loc.ru/api/register
Для регистрации обязательны следущие поля : name, email, password.

    {
        "name": "Maxim",
        "email": "maksarik1@yandex.ru",
        "password": "12345678"
    }





### 1

