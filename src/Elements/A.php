<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class A extends BaseElement
{
    use Macroable;

    protected $tag = 'a';

    /**
     * @param string|null $href
     *
     * @return static
     */
    public function href($href)
    {
        return $this->attribute('href', $href);
    }
}
