<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Spatie\Html\Traits\HasValueAttribute;

class Input extends BaseElement
{
    use HasValueAttribute;

    protected $tag = 'input';

    /**
     * @param string $name
     *
     * @return static
     */
    public function name(string $name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * @param string $type
     *
     * @return static
     */
    public function type(string $type)
    {
        return $this->attribute('type', $type);
    }
}
