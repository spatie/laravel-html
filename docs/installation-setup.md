---
title: Installation & setup in Laravel
weight: 3
---

Before installing the package make sure you have (at least) PHP 7 installed. (No, we won't make a version that's compatible with an earlier version of PHP).

Laravel Html can be installed via composer:

```bash
composer require spatie/laravel-html
```

Next, you need to register the service provider:

```php
// config/app.php
'providers' => [
    ...
    Spatie\Html\HtmlServiceProvider::class,
];
```

If you're using Laravel 11:

```php
// bootstrap/providers.php
return [
    ...
    Spatie\Html\HtmlServiceProvider::class,
];
```
