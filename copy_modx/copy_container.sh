#!/bin/bash

# Создать локальную директорию, если она не существует
if [ ! -d "./modx" ]; then
  mkdir ./modx
fi

# Скопировать файлы из контейнера modx_app на локальный хост
docker cp modx_app:/var/www/html ../modx

echo "The files were copied from the modx_app container to the ../modx directory"