<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Textarea extends BaseElement
{
    protected $tag = 'textarea';

    /**
     * @return static
     */
    public function autofocus()
    {
        return $this->attribute('autofocus');
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public function name(?string $name)
    {
        return $this->attribute('fieldName', $name);
    }

    /**
     * @param string $value
     *
     * @return static
     */
    public function value(?string $value)
    {
        return $this->html($value);
    }
}
