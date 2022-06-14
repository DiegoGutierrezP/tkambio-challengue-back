
1. Ejecutar los comandos:
 - composer install
 - npm install

2. Crear el archivo .env:
 - Hacer una copia del archivo .env.example y renombrarlo como .env
 - php artisan key:generate

3. Ejcutar las migraciones con los seeders
 - php artisan migrate --seed

4. Ejecutar comando(Para crear el enlace simbólico para archivos)
 - php artisan storage:link

5. Probar api generar reporte
 - para probar esta api , ejecutar el comando: php artisan queue:work
