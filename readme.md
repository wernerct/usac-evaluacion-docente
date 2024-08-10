## Description

[Comandos]() Comandos del proceso de desarrollo.

## Creacion de la app

```bash
curl -s https://laravel.build/evaluaciondocente-app | bash
```

## servicios de sail con docker

```bash
# levantar sail
./vendor/bin/sail up

# bajar sail
./vendor/bin/sail down
```

## Crear Alias de sail

```bash
# editar el archivo bash para sacar la virgulilla(~) usar altgr+4
sudo nano ~/.bash

# agregar la siguiente linea al final
alias sail="./vendor/bin/sail"

# recargar bash
source ~/.bashrc

# verificar alias
alias

```

## Comandos de sail

```bash
#Comandos varios de sail
sail
sail php --version
sail artisan
sail composer --version
sail node --version
sail npm run prod
sail yarn
sail test
sail test --group orders
sail dusk
sail tinker
```

## publicar con sail (Solo es para ver el funcionamiento de la pagina)

```bash
# mostrar con sail
sail share
```

## Para instalar tailwind con sail

```bash
# mostrar con sail
sail npm install -D tailwindcss postcss autoprefixer
# generar archivo js de tailwind
npx tailwindcss init -p
```

## Carga a git

```bash
git add .
git commit -m "comentario del commit"
git push -u origin main # o tambien puede ser master

```

## Arancar servidor

```bash
#para interactuar con php
sail artisan tinker

#para crear un controller
sail artisan make:controller ArchivoController

#para hacer rollback
sail artisan migrate:makemigrations
sail artisan migrate:refresh
sail artisan make:migrations
sail artisan migrate

#para hacer rollback
sail artisan migrate:rollback
sail artisan migrate:rollback --path /database/migrations/2024_07_11_045629_create_evaluacion_docentes_table.php


git commit -m "comentario del commit"
git push -u origin main # o tambien puede ser master

```

## usar livewire

```bash
#requerir livewire
sail composer require livewire/livewire
```

## usar datatable

```bash
#requerir datatable
sail composer require rappasoft/laravel-livewire-tables
sail composer show rappasoft/laravel-livewire-tables
#para crear componente
sail php artisan make:datatable UsuariosTable User ##sail php artisan make:datatable [NOmbreTabla] [MOdelo]
php artisan vendor:publish --provider="Rappasoft\LaravelLivewireTables\LaravelLivewireTablesServiceProvider" --tag=livewire-tables-config
#el de la vista en la pgina no recomienda para publicar pero si se quiere pasar al español si se hace

php artisan vendor:publish --provider="Rappasoft\LaravelLivewireTables\LaravelLivewireTablesServiceProvider" --tag=livewire-tables-translations

php artisan vendor:publish --provider="Rappasoft\LaravelLivewireTables\LaravelLivewireTablesServiceProvider" --tag=livewire-tables-public

#ubicacion de la creacion del componente
#app/Livewire/UsuariosTable.php
```

## publicar lenguaju y pasarlo a español

```bash
#publicar lenguaje
sail php artisan lang:publish
sail composer require --dev laravel-lang/common
sail php artisan lang:add es

```

## Stay in touch

- Author - [Werner Coyoy](https://kamilmysliwiec.com)
- Website - [https://gwebpos.com](https://nestjs.com/)

## License

Nest is [MIT licensed](LICENSE).
