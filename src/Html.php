<?php

namespace Spatie\Html;

use Spatie\Html\Elements\Element;
use Spatie\Html\Elements\Option;
use Spatie\Html\Elements\Select;

class Html
{
    public static function element(string $tag): Element
    {
        return Element::withTagName($tag);
    }

    public static function select(array $options = []): Select
    {
        return (new Select())->options($options);
    }

    public static function option(string $text = '', string $value = '', $selected = false): Option
    {
        return (new Option())
            ->text($text)
            ->value($value)
            ->selectedIf($selected);
    }
}
