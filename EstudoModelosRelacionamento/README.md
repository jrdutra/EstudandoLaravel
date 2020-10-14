# Estudando relacionamentos entre modelos

Esta parte se dedicará ao estudo do relacionamento entre modelos seguindo o diagrama abaixo:

![Modelo](https://raw.githubusercontent.com/jrdutra/EstudandoLaravel/master/EstudoModelosRelacionamento/modelo.png)

### Criando um Model

Para criar um model, basta inserir o comando no termina:

```
php artisan make:model Proprietario
```

Para criar a migration junto:

```
php artisan make:model Flight --migration
```

ou

```
php artisan make:model Flight --m
```

#### Os Models
https://laravel.com/docs/5.7/eloquent

#### As Migrations
https://laravel.com/docs/5.7/migrations

e 

https://laravel.com/docs/5.7/migrations#creating-tables