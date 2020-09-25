# Passos para instalar o Laravel + Composer: #

# (LINUX) #

## Configurações de diretórios iniciais:

```
sudo apt update
```

```
sudo apt install wget php-cli php-zip php-mbstring php-xml unzip
```

```
mkdir ~/Programas
```

```
mkdir ~/Programas/composer
```

```
cd ~/Programas/composer
```

## Composer:

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
```

**Pegando o hash do pacote baixado:**

```
HASH="$(wget -q -O - https://composer.github.io/installer.sig)"
```

**Verificando o hash:**

```
php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
```

*Resultado:*
*Installer verified*

**Instalado o composer de fato:**

```
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

**Verificando:**

```
composer
```

*Resultado:* Deve aparecer o logo do composer desenhado em barras no terminal

## Laravel:

**Iniciar o projeto Laravel:**

```
composer create-project laravel/laravel aprendendo-laravel --prefer-dist
```

**Startar o projeto Laravel:**

```
sudo php artisan serve --host=localhost --port=82
```


## Possíveis Erros:

**Para o seguinte erro:**

failed to open stream: No such file or directory in...

**Tentar**

```
php artisan config:cache
```

```
php artisan config:clear
```

```
composer dump-autoload -o
```

**OU**

Deletar a pasta *vendor* e o arquivo *composer.lock* e rodar o comando:

```
composer install
```

**Para erro de CORS ORIGIN:**

Rode:

```
php artisan make:middleware ModifyHeadersMiddleware
```

Abra o arquivo **ModifyHeadersMiddleware** e altere o método handle():


```php
public function handle($request, Closure $next) 
{ 
    $response = $next($request); 
    $response->header('Access-Control-Allow-Origin', '*'); 
    $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type'); 

    return $response; 
} 
```

Abra app / Http / Kernel.php e adicione a classe ModifyHeadersMiddlewar e na matriz .protected $middleware

Fonte: [https://stackoverrun.com/ru/q/10354933](https://stackoverrun.com/ru/q/10354933)

**Para o erro: No application encryption key has been specified.**

Rodar o seguinte ocmando para gerar a chave:

```
php artisan key:generate
```

Rodar os seguintes comandos para limpar o cache:

```
php artisan config:clear
```

```
php artisan config:cache
```

Fonte: [stackoverflow.com](https://stackoverflow.com/questions/52985757/error-no-application-encryption-key-has-been-specified-but-it-exist)

## Comandos úteis Laravel:

**Para criar base:**

```
php artisan migrate
```

**Para atualizar base:**

```
php artisan migrate:refresh
```

**Criar nova migração para uma tabela já existente**

(Utilizado para adicionar um novo campo em uma tabela por exemplo)

```
php artisan make:migration add_imagem_table_users --table=users
```

**Criar um Controller**

```
php artisan make:controller UsuarioController
```

**Criar link com a pasta Storage:**

```
php artisan storage:link
```


**Limpar Cache:**

```
sudo php artisan config:cache
```

**Instalar Intervention/Image:**

```
composer require intervention/image
```

**Outros**

```
php --version
```

```
sudo apt-get install php7.2-gd
```

## Compatibilidades de Pacotes

**Laravel com Passport e corretor de CrossOrigin**

```
composer create-project --prefer-dist laravel/laravel webservice "5.7.15"
```

```
composer require laravel/passport  "7.5.1"
```

Depois de rodar o comando anterior, lembrar de instalar o passport com o seguinte comando:

```
php artisan passport:install --force
```

**Para o corretor de crossorigin**, de acordo com as versões apresentadas acima, instalar da seguinte forma:

1. Comando de instalação:

```
composer require barryvdh/laravel-cors "^0.11.0"

```

2. ir no arquivo /app/Http/Kernel.php e procurar por 'api' e modificar da segunte forma:

```php
	'api' => [
            'throttle:60,1',
            'bindings',
            \Barryvdh\Cors\HandleCors::class
        ],
```

incluindo a linha `\Barryvdh\Cors\HandleCors::class`.


# VUE.js

## Comandos importantes

**Rodar o projeto**

Dentro da pasta do projeto, executar o seguinte comando:

```
npm run dev
```





