---
title: Installation & setup in Laravel
weight: 3
---

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
