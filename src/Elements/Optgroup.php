<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class Optgroup extends BaseElement
{
    use Macroable;

    protected $tag = 'optgroup';

    /**
     * @param string|null $href
     *
     * @return static
     */
    public function label($label)
    {
        return $this->attribute('label', $label);
    }
}
