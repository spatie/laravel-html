<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class A extends BaseElement
{
    protected $tag = 'a';

    /**
     * @param string $href
     *
     * @return static
     */
    public function href(string $href)
    {
        return $this->attribute('href', $href);
    }
}
