<?php

namespace Spatie\Html\Elements\Attributes;

trait Readonly
{
    /**
     * @param bool $readonly
     *
     * @return static
     */
    public function readonly($readonly = true)
    {
        return $readonly
            ? $this->attribute('readonly')
            : $this->forgetAttribute('readonly');
    }
}
