<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class Button extends BaseElement
{
    use Macroable;

    protected $tag = 'button';

    /**
     * @param string|null $type
     *
     * @return static
     */
    public function type($type)
    {
        return $this->attribute('type', $type);
    }

    /**
     * @param string|null $value
     *
     * @return static
     */
    public function value($value)
    {
        return $this->attribute('value', $value);
    }
}
