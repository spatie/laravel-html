<?php

namespace Spatie\Html\Facades;

use Spatie\Html\Html as HtmlBuilder;
use Illuminate\Support\Facades\Facade;

class Html extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @see \Spatie\Html\Html
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return HtmlBuilder::class;
    }
}
