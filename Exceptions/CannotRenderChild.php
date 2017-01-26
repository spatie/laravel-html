<?php

namespace Spatie\Html\Exceptions;

use Exception;
use Spatie\Html\HtmlElement;

class CannotRenderChild extends Exception
{
    /**
     * @param mixed $child
     *
     * @return static
     */
    public static function childMustBeAnHtmlElementOrAString($child)
    {
        return new static('The given child should implement `'.HtmlElement::class.'` or be a string');
    }
}
