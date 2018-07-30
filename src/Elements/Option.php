<?php

namespace Spatie\Html\Elements;

use Spatie\Html\Selectable;
use Spatie\Html\BaseElement;
use Spatie\Html\Disabledable;

class Option extends BaseElement implements Selectable, Disabledable
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
     * @return static
     */
    public function disabled()
    {
        return $this->attribute('disabled', 'disabled');
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
     * @param bool $condition
     *
     * @return static
     */
    public function disabledIf($condition)
    {
        return $condition ?
            $this->disabled() :
            $this->undisabled();
    }

    /**
     * @return static
     */
    public function unselected()
    {
        return $this->forgetAttribute('selected');
    }

    /**
     * @return static
     */
    public function undisabled()
    {
        return $this->forgetAttribute('disabled');
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
