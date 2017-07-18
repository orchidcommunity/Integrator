# Orchid Integrator

Experimental

## Installation

install package

```php
composer require orchid/integrator
```

edit config/app.php service provider :

```php
 Orchid\Integrator\Providers\IntegratorServiceProvider::class
```

### Create :
	
To create a new form, you need to
```php
php artisan make:admin-form UserAdmin
```



## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
