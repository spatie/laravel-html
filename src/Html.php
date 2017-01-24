<?php

namespace Spatie\Html;

use Spatie\Html\Elements\A;
use Spatie\Html\Elements\Div;
use Spatie\Html\Elements\Form;
use Spatie\Html\Elements\Input;
use Spatie\Html\Elements\Label;
use Spatie\Html\Elements\Option;
use Spatie\Html\Elements\Select;
use Spatie\Html\Elements\Element;

class Html
{
    /**
     * @param string $href
     * @param string $text
     *
     * @return \Spatie\Html\Elements\A
     */
    public function a(string $href, string $text = '')
    {
        return A::create()
            ->href($href)
            ->text($text);
    }

    /**
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function checkbox(string $name = '', string $value = '')
    {
        return static::input('checkbox', $name, $value);
    }

    /**
     * @return \Spatie\Html\Elements\Div
     */
    public function div()
    {
        return Div::create();
    }

    /**
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function email(string $name = '', string $value = '')
    {
        return static::input('email', $name, $value);
    }

    /**
     * @param string $tag
     *
     * @return \Spatie\Html\Elements\Element
     */
    public function element(string $tag)
    {
        return Element::withTag($tag);
    }

    /**
     * @param string $type
     * @param string $name
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function input(string $type = '', string $name = '', string $value = '')
    {
        return Input::create()
            ->type($type)
            ->name($name)
            ->value($value);
    }

    /**
     * @param string $method
     * @param string $action
     *
     * @return \Spatie\Html\Elements\Form
     */
    public function form(string $method = '', string $action = '')
    {
        return Form::create()
            ->method($method)
            ->action($action);
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function hidden(string $name = '', string $value = '')
    {
        return static::input('hidden', $name, $value);
    }

    /**
     * @param string $for
     *
     * @return \Spatie\Html\Elements\Label
     */
    public function label(string $for = '')
    {
        return Label::create()->for($for);
    }

    /**
     * @param string $email
     * @param string $text
     *
     * @return \Spatie\Html\Elements\A
     */
    public function mailto(string $email, string $text = '')
    {
        return static::a('mailto:'.$email, $text);
    }

    /**
     * @param string $text
     * @param string $value
     * @param bool $selected
     *
     * @return \Spatie\Html\Elements\Option
     */
    public function option(string $text = '', string $value = '', $selected = false)
    {
        return Option::create()
            ->text($text)
            ->value($value)
            ->selectedIf($selected);
    }

    /**
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function password(string $name = '', string $value = '')
    {
        return static::input('password', $name, $value);
    }

    /**
     * @param string $number
     * @param string $text
     *
     * @return \Spatie\Html\Elements\A
     */
    public function tel(string $number, string $text = '')
    {
        return static::a('tel:'.$number, $text);
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function text(string $name = '', string $value = '')
    {
        return static::input('text', $name, $value);
    }

    /**
     * @param iterable $options
     *
     * @return \Spatie\Html\Elements\Select
     */
    public function select(iterable $options = [])
    {
        return Select::create()->options($options);
    }
}
