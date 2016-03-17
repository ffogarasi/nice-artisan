## Nice Artisan ##

This package is to add a web interface for Laravel 5 Artisan.

For Laravel 5.2 get branch laravel_5_2 !

For Laravel 5.1 get branch laravel_5_1 !

It's still a work in progress.

### Installation ###

Add Nice Artisan to your composer.json file :
```
    composer require ffogarasi/nice-artisan
```

The next required step is to add the service provider to config/app.php :
```
    FFogarasi\NiceArtisan\NiceArtisanServiceProvider::class,
```

And copy the package config to your local config with the publish command:
```
    php artisan vendor:publish
```

In the `config/nice-artisan.php` generate a long enough random token.
This is used as an API token if you want to call artisan commands using curl for example.

You can change options and commands in `config/commands.php`. The menu is dynamically created with this config.

Now it must work with this url :
```
    .../niceartisan
```



### Middleware ###

If you want to use this package on a production application you must protect the urls with a middleware for your security !
For this you can change `checkUser` function in the provided middleware.

And register it in Kernel with `nice_artisan` name :

```
protected $routeMiddleware = [
    ....
    'nice_artisan' => \App\Http\Middleware\NiceArtisanMiddleware::class,
];

``` 

If you have CSRF verification enabled then create your custom VerifyCsrfToken class as it is described here:
https://laravel.com/docs/master/routing section `Excluding URIs From CSRF Protection` and add the exception for the rest_item route


### Screenshots ###

![nice-artisan1](https://cloud.githubusercontent.com/assets/2959682/11610549/a9a3055c-9ba6-11e5-936b-f1d3830baf62.jpg)
![nice-artisan2](https://cloud.githubusercontent.com/assets/2959682/11610548/a9a308e0-9ba6-11e5-9cee-94d7cc373024.jpg)
![nice-artisan3](https://cloud.githubusercontent.com/assets/2959682/11610547/a9a00942-9ba6-11e5-88b6-9c30f25f220f.jpg)

