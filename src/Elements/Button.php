<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Button extends BaseElement
{
    protected $tag = 'button';

    /**
     * @param string $type
     *
     * @return static
     */
    public function type(string $type)
    {
        return $this->attribute('type', $type);
    }

    /**
     * @param string $value
     *
     * @return static
     */
    public function value(string $value)
    {
        return $this->attribute('value', $value);
    }
}
