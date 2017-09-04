<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class Input extends BaseElement
{
    use Macroable;

    protected $tag = 'input';

    /**
     * @return static
     */
    public function autofocus()
    {
        return $this->attribute('autofocus');
    }

    /**
     * @param  bool $checked
     *
     * @return static
     */
    public function checked($checked = true)
    {
        return $checked
            ? $this->attribute('checked', 'checked')
            : $this->forgetAttribute('checked');
    }

    /**
     * @param string|null $name
     *
     * @return static
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
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
     * @return static
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * @param string|null $type
     *
     * @return static
     */
    public function type($type)
    {
        return $this->attribute('type', $type);
    }

    /**
     * @return static
     */
    public function unchecked()
    {
        return $this->checked(false);
    }

    /**
     * @param string|null $value
     *
     * @return static
     */
    public function value($value)
    {
        return $this->attribute('value', $value);
    }
}
