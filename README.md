# MODX in Docker

Для запуска контейнера создать папку `src` и закинуть в нее распакованный 
архив modx любой версии, далее зайти в контейнер и прописать:
```shell
chown -R www-data:www-data . && chmod -R 755 .
```

После этого можно заходить по адресу [modx](http://localhost/setup) и продолжать
установку.

Для базы данных использовать такие данные:

URL: `localhost:3306`

User: `modx`

Password: `modx`

DB_name: `modx`
