---
title: Extending the package
weight: 2
---

If you want to extend the Html package, you can do the following.

Create a class that extends Html:


```php
<?php

namespace App\Html;

use Spatie\Html\Html;
use Spatie\Html\Elements\Div;

class HtmlExtended extends Html
{
}
```

Re-Register the class in the AppServiceProvider:

```php
<?php

namespace App\Providers;

use App\Helpers\HtmlExtended;
use Illuminate\Support\ServiceProvider;
use Spatie\Html\Html;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Html::class, HtmlExtended::class);
    }
}
```
