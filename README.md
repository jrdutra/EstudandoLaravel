# Passos para instalar o Laravel + Composer:

(LINUX)


## Composer:


sudo apt update

sudo apt install wget php-cli php-zip php-mbstring php-xml unzip


mkdir ~/Programas

mkdir ~/Programas/composer

cd ~/Programas/composer

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

**Pegando o hash do pacote baixado**

HASH="$(wget -q -O - https://composer.github.io/installer.sig)"

**Verificando o hash**

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

*Resultado:*
*Installer verified*

**Instalado o composer de fato**

sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer


