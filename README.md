## PHP Technical test 1
## Init

1. ``.\bin\vendor\sail up``
2. ``.\bin\vendor\sail artisan migrate``
3. ``.\bin\vendor\sail artisan db:seed``
4 ``.\bin\vendor\sail artisan test``

## Endpoints
- GET - \users with query params: active(numeric) and country(string)
- PATCH - \users\{userId}
- DELETE - \users\{userId}
