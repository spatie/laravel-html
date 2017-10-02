<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class Textarea extends BaseElement
{
    use Macroable;

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
     * @param string|null $value
     *
     * @return static
     */
    public function value($value)
    {
        return $this->html($value);
    }
    
    /**
     * @param string|null $style
     *
     * @return static
     */
    public function style($style)
    {
        return $this->attribute('style', $style);
    }
}
