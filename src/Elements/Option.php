<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Spatie\Html\Traits\HasValueAttribute;

class Option extends BaseElement
{
    use HasValueAttribute;

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
