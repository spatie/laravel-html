<?php

namespace Spatie\Html\Traits;

trait HasValueAttribute
{
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
