
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

5. Crear un dominio virtual con el nombre tkambio.test
   https://electroniciot.com/crear-dominio-virtual-con-xampp-y-windows-10-2021

6. Probar api generar reporte
 - para probar esta api , ejecutar el comando: php artisan queue:work
