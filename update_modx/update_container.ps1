# Удаляем существующие файлы в контейнере modx_app
docker exec -it modx_app rm -rf /var/www/html/*

# Скопировать новые файлы с локального хоста в контейнер modx_app
docker cp ../modx/. modx_app:/var/www/html

Write-Host "The files were copied from the local host to the modx_app container after deleting the existing files"
