<?php

namespace Spatie\Html\Elements;

use Illuminate\Support\Traits\Macroable;
use Spatie\Html\BaseElement;

class Label extends BaseElement
{
    use Macroable;

    protected $tag = 'label';

    /**
     * @param string|null $for
     *
     * @return static
     */
    public function for($for)
    {
        return $this->attribute('for', $for);
    }
}
