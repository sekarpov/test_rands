# Тестовое задание для PHP developer

Сервис для генерации случайных идентификаторов.

## Запуск

`docker-compose up -d --build`

`docker-compose exec php-cli composer install`

## Использование

Базовый url: http://localhost:8080

**Создание случайных идентификаторов**

POST /api/indicators
```json
{
  "type": "string|guid|number|alphanumeric",
  "length": "15",
}
```
_type_ - тип случайновго идентификатора (*). Принимает следующие значения: строка, guid, число, цифробуквенное.

_length_ - длина случайновго идентификатора (*)

GET /api/indicators/{id}

_id_ - id созданного идентификатора

## Test

`docker-compose exec php-cli composer test`
