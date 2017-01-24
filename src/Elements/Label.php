<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Label extends BaseElement
{
    /**
     * @param string $for
     *
     * @return static
     */
    public function for(string $for)
    {
        return $this->attribute('for', $for);
    }
}
