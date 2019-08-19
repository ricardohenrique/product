# Gerenciador de produtos

### Instalação

Esse projeto requisita [PHP](http://www.php.net/) v7.1+ para ser executado.

Clone o projeto:
```sh
$ git clone https://gitlab.com/ricardo.mota/api-manager-product-by-spreadsheet.git
```

Vá para a pasta:
```sh
$ cd product
```

Instale as dependências:
```sh
$ composer install
```

Crie o arquivo .env:
```sh
$ cp .env.example .env
```

Configure o arquivo .env:
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={YOUR_NAME_DATABASE}
DB_USERNAME={YOUR_USERNAME}
DB_PASSWORD={YOUR_PASSWORD}
```

Execute as migrates e as seeds:
```sh
$ php artisan migrate && php artisan db:seed
```

Execute os teste unitários de serviços :):
```sh
$ vendor\bin\phpunit
```
