<?php

namespace Spatie\Html\Elements;

use Spatie\Html\Selectable;
use Spatie\Html\BaseElement;

class Option extends BaseElement implements Selectable
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
     * @return static
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
     * @param string|null $value
     *
     * @return static
     */
    public function value($value)
    {
        return $this->attribute('value', $value);
    }
}
