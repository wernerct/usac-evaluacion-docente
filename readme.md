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

## Stay in touch

- Author - [Werner Coyoy](https://kamilmysliwiec.com)
- Website - [https://gwebpos.com](https://nestjs.com/)

## License

Nest is [MIT licensed](LICENSE).
