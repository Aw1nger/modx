# Создать локальную директорию, если она не существует
if (-Not (Test-Path -Path "./modx")) {
    New-Item -ItemType Directory -Path "./modx"
}

# Скопировать файлы из контейнера modx_app на локальный хост
docker cp modx_app:/var/www/html ../modx

Write-Host "The files were copied from the modx_app container to the ../modx directory"