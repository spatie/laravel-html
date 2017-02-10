<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Label extends BaseElement
{
    protected $tag = 'label';

    /**
     * @param string $for
     *
     * @return static
     */
    public function for(?string $for)
    {
        return $this->attribute('for', $for);
    }
}
