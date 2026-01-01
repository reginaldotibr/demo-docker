<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).








## Requisitos

* PHP 8.2 ou superior - Conferir a versão: php -v
* Composer - Conferir a instalação: composer --version
* Node.js 22 ou superior - Conferir a versão: node -v

## Criar o projeto com Laravel no PC e criar o container no Docker

- Acessar o prompt de comando ou o terminal do editor VSCode.

Criar o projeto com Laravel sem instalar o mesmo de forma global no sistema operacional.
```
composer create-project laravel/laravel meu-projeto-docker
```

Acessar o diretório do projeto.
```
cd meu-projeto-docker
```

Instalar o Sail no projeto existente.
```
composer require laravel/sail --dev
```

- Acessar WSL.

Adicionar o repositório do PHP.
```
sudo apt update
sudo apt install software-properties-common -y
sudo add-apt-repository ppa:ondrej/php
sudo apt update
```

Instalar especificamente o PHP 8.4 e as extensões. Verifique na documentação do Laravel qual versão do PHP é suportado. 
```
sudo apt install php8.4 php8.4-cli php8.4-xml php8.4-mbstring php8.4-curl php8.4-zip php8.4-mysql unzip curl git -y
```

Definir o PHP 8.4 como padrão no sistema.
```
sudo update-alternatives --install /usr/bin/php php /usr/bin/php8.4 1
sudo update-alternatives --set php /usr/bin/php8.4
```

Listar as versões do PHP instaladas.
```
sudo update-alternatives --config php
```

Verificar se o PHP 8.4 está ativo.
```
php -v
```

Acessar o diretório que será criado o projeto "c:/.../htdocs/../meu-projeto-docker". /mnt/c → é onde o WSL monta o disco C: do Windows. /mnt/c/.../htdocs/... → equivale a C:\.../htdocs/....
```
cd /mnt/c/.../htdocs/.../meu-projeto-docker
```

Publicar o docker-compose.yml e alterar no arquivo .env as variáveis ​​de ambiente necessárias para se conectar aos serviços do Docker.
```
php artisan sail:install
```

Criar os containers com Laravel e MySQL.
```
./vendor/bin/sail up -d
```

Rodar a migrate para criar a base de dados e as tabelas.
```
./vendor/bin/sail artisan migrate
```

Rodar as seedeers para cadastrar registro de teste.
```
./vendor/bin/sail artisan db:seed
```

Acessar a aplicação no navegador de internet.
```
http://127.0.0.1
```
```
http://localhost
```

## Acessar o MySQL do container criado no Docker

Acessar o MySQL do container via Laravel Sail. Caso o usuário "sail" não tenha permissão de acesso é necessário liberar a permissão.
```
./vendor/bin/sail mysql
```

Listar as base de dados.
```
SHOW DATABASES;
```

Acessar a base de dados. Nome da base de dados definida no arquivo ".env".
```
USE laravel;
```

Listar as tabelas.
```
SHOW TABLES;
```

Listar os usuários cadastrados na tabela "users".
```
SELECT * FROM users;
```

Sair do MySQL.
```
CTRL + D
```

## Liberar permissão de acesso ao banco de dados para o usuário sail.

Descobrir o nome do container MySQL.
```
docker ps
```

Acessar o container MySQL.
```
docker exec -it meu-projeto-docker-mysql-1 bash	
```

Acessar o MySQL do container.
```
mysql -u root -p
```

- Digitar a senha: password

Criar ou garantir acesso ao banco laravel com "sail".
```
CREATE DATABASE IF NOT EXISTS laravel;
GRANT ALL PRIVILEGES ON laravel.* TO 'sail'@'%';
FLUSH PRIVILEGES;
```