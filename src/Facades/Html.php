<?php

namespace Spatie\Html\Facades;

use Spatie\Html\Html as HtmlBuilder;

class Html
{
    /**
     * Get the registered name of the component.
     *
     * @see \Spatie\Html\Html
     * 
     * @return string
     */
    protected static function getFacadeAccessor() {
        return HtmlBuilder::class;
    }
}
