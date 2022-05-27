<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Proyecto Gestión Ventas Minersa S.R.L

##Dependencias
- Se debe tener instalado [XAMPP](https://www.apachefriends.org/es/download.html "XAMPP")
- Se debe tener instalado [Composer](https://getcomposer.org/download/ "Composer")

## Como instalar
1. Clone el repositorio a una carpeta en local

1. Abra el proyecto en **Visual Studio Code**

1. Ejecute la aplicación **XAMPP** e inice los módulos de **Apache** y **MySQL**

1. Abra una nueva terminal en **Visual Studio Code**

1. Compruebe de que tiene instalado todas dependencias correctamente, ejecute los siguientes comandos: **(Ambos comandos deberán ejecutarse correctamente)**
```bash
php -v
```
```bash
composer -v
```

1. Ahora ejecute los comandos para la configuración del proyecto:

- Este comando nos va a instalar todas la dependencias de composer, lee el archivo **composer.json** y crea la carpeta **vendor**
```bash
composer install
```
- Duplique el archivo **.env.example**, al archivo duplicado cambiar de nombre como **.env**, este archivo se debe modificar según las configuraciones de nuestro proyecto, en nuestro caso se deben modificar las conexiones para nuestra base de datos
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbsistema_ventas 
DB_USERNAME=root
DB_PASSWORD=
```
- Este comando nos generará una nueva key, lo agregará el archivo** .env** automáticamente
```bash
php artisan key:generate 
```
## Ultimos pasos
1. Entrar a la configuración de **[phpMyAdmin](http://localhost/phpmyadmin/ "phpMyAdmin")**
2. Crear una nueva base de datos, deberá tener el nombre que se ha puesto en el archivo **.env**
3. Correr la migraciones del proyecto, para eso debemos ejecutar el comando:
```bash
php artisan migrate
```
4. Ejecute el proyecto con el comando:
```bash
php artisan serve
```

## Notas
## Editor.md
Readme Hecho en [Pandao](https://pandao.github.io/editor.md/en.html "Pandao")
![](https://pandao.github.io/editor.md/images/logos/editormd-logo-180x180.png)










## HAHAHAHHAHAH
### XDXDXDXDXDDXXD