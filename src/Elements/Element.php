<?php

namespace Spatie\Html\Elements;

use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Macroable;
use ReflectionClass;
use Spatie\Html\Attributes;
use Spatie\Html\BaseElement;

class Element extends BaseElement
{
    use Macroable;
    
    /**
     * @param string $tag
     *
     * @return static
     */
    public static function withTag($tag)
    {
        $element = (new ReflectionClass(static::class))->newInstanceWithoutConstructor();

        $element->tag = $tag;
        $element->attributes = new Attributes();
        $element->children = new Collection();

        return $element;
    }
}
