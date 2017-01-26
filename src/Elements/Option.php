<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Option extends BaseElement
{
    /** @var string */
    protected $tag = 'option';

    /**
     * @return static
     */
    public function selected()
    {
        return $this->attribute('selected', 'selected');
    }

    /**
     * @param bool $condition
     *
     * @return \Spatie\Html\Elements\Option
     */
    public function selectedIf($condition)
    {
        return $condition ?
            $this->selected() :
            $this->unselected();
    }

    /**
     * @return static
     */
    public function unselected()
    {
        return $this->forgetAttribute('selected');
    }

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
