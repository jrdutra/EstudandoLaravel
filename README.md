# Passos para instalar o Laravel + Composer: #

# (LINUX) #

## Configurações de diretórios iniciais:

sudo apt update

sudo apt install wget php-cli php-zip php-mbstring php-xml unzip

mkdir ~/Programas

mkdir ~/Programas/composer

cd ~/Programas/composer

## Composer:

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

**Pegando o hash do pacote baixado:**

HASH="$(wget -q -O - https://composer.github.io/installer.sig)"

**Verificando o hash:**

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

*Resultado:*
*Installer verified*

**Instalado o composer de fato:**

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

**Verificando:**

composer

*Resultado:* Deve aparecer o logo do composer desenhado em barras no terminal

## Laravel:

**Iniciar o projeto Laravel:**

composer create-project laravel/laravel aprendendo-laravel --prefer-dist

**Startar o projeto Laravel:**

sudo php artisan serve --host=localhost --port=82


## Possíveis Erros:

**Para:**

failed to open stream: No such file or directory in...

**Tentar**

php artisan config:cache 

php artisan config:clear 

composer dump-autoload -o

**OU**

Deletar a pasta *vendor* e o arquivo *composer.lock* e rodar o comando *composer install*

## Comandos úteis Laravel:

**Para criar base:**

 php artisan migrate

**Para atualizar base:**

php artisan migrate:refresh

**Criar link com a pasta Storage:**

php artisan storage:link

**Limpar Cache:**

sudo php artisan config:cache

**Instalar Intervention/Image**

composer require intervention/image

php --version

sudo apt-get install php7.2-gd


