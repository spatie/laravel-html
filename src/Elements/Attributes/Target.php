<?php

namespace Spatie\Html\Elements\Attributes;

trait Target
{
    /**
     * @param string $name
     *
     * @return static
     */
    public function target($name)
    {
        return $this->attribute('target', $name);
    }
}
