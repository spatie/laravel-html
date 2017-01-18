<?php

namespace Spatie\Html;

use Spatie\Html\Elements\Div;
use Spatie\Html\Elements\Option;
use Spatie\Html\Elements\Select;
use Spatie\Html\Elements\Element;

class Html
{
    /**
     * @return \Spatie\Html\Div
     */
    public function div()
    {
        return Div::create();
    }

    /**
     * @param string $tag
     *
     * @return \Spatie\Html\Select
     */
    public function element(string $tag)
    {
        return Element::withTag($tag);
    }

    /**
     * @param string $text
     * @param string $value
     * @param bool $selected
     *
     * @return \Spatie\Html\Option
     */
    public function option(string $text = '', string $value = '', $selected = false)
    {
        return Option::create()
            ->text($text)
            ->value($value)
            ->selectedIf($selected);
    }

    /**
     * @param iterable $options
     *
     * @return \Spatie\Html\Select
     */
    public function select(iterable $options = [])
    {
        return Select::create()->options($options);
    }
}
