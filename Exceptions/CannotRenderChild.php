<?php

namespace Spatie\Html\Exceptions;

use Exception;
use Spatie\Html\BaseElement;

class childMustBeABaseElementOrAString extends Exception
{
    /**
     * @param mixed $child
     *
     * @return static
     */
    public static function childMustBeAnElementOrAString($child)
    {
        return new static('The given child should be a ' . BaseElement::class . ' or a string');
    }
}