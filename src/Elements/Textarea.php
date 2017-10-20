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
     * @param string|null $placeholder
     *
     * @return static
     */
    public function placeholder($placeholder)
    {
        return $this->attribute('placeholder', $placeholder);
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * @return static
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * @param string|null $value
     *
     * @return static
     */
    public function value($value)
    {
        return $this->html($value);
    }
}
