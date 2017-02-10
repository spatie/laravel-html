<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Input extends BaseElement
{
    protected $tag = 'input';

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
        return $this->attribute('name', $name);
    }

    /**
     * @param string $placeholder
     *
     * @return static
     */
    public function placeholder(?string $placeholder)
    {
        return $this->attribute('placeholder', $placeholder);
    }

    /**
     * @param string $type
     *
     * @return static
     */
    public function type(?string $type)
    {
        return $this->attribute('type', $type);
    }

    /**
     * @param string $value
     *
     * @return static
     */
    public function value(?string $value)
    {
        return $this->attribute('value', $value);
    }
}
