<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Option extends BaseElement
{
    /** @var string */
    protected $tag = 'option';

    /**
     * @param string $text
     *
     * @return static
     */
    public function text(string $text)
    {
        return $this->setChildren($text);
    }

    /**
     * @param string $value
     *
     * @return static
     */
    public function value(string $value)
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * @return static
     */
    public function selected()
    {
        return $this->setAttribute('selected', 'selected');
    }

    /**
     * @return static
     */
    public function unselected()
    {
        return $this->forgetAttribute('selected');
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
}
