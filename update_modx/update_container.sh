#!/bin/bash

# Скопировать файлы с локального хоста в контейнер modx_app
docker cp ../modx/. modx_app:/var/www/html

echo "The files were copied from the local host to the modx_app container"
