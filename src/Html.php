<?php

namespace Spatie\Html;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Traits\Macroable;
use Spatie\Html\Elements\A;
use Spatie\Html\Elements\Button;
use Spatie\Html\Elements\Div;
use Spatie\Html\Elements\Form;
use Spatie\Html\Elements\Input;
use Spatie\Html\Elements\Label;
use Spatie\Html\Elements\Option;
use Spatie\Html\Elements\Select;
use Spatie\Html\Elements\Element;
use Spatie\Html\Elements\Span;
use Spatie\Html\Elements\Textarea;

class Html
{
    use Macroable;

    /** @var \Illuminate\Http\Request */
    protected $request;

    /** @var \Illuminate\Contracts\Session\Session */
    protected $session;

    /** @var \Illuminate\Contracts\Routing\UrlGenerator */
    protected $urlGenerator;

    /** @var \ArrayAccess|array */
    protected $model;

    public function __construct(Request $request, Session $session, UrlGenerator $urlGenerator)
    {
        $this->request = $request;
        $this->session = $session;
        $this->urlGenerator = $urlGenerator;
    }

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
     * @param string $type
     * @param string $text
     *
     * @return \Spatie\Html\Elements\Button
     */
    public function button(string $text = '', string $type = 'button')
    {
        return Button::create()
            ->type($type)
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
            ->value($name ? $this->old($name, $value) : $value);
    }

    /**
     * @param string $method
     * @param string $action
     * @param array $parameters
     *
     * @return \Spatie\Html\Elements\Form
     */
    public function form(string $method = 'POST', string $action = '', array $parameters = [])
    {
        $method = strtoupper($method);
        $form = Form::create();

        // If Laravel needs to spoof the form's method, we'll append a hidden
        // field containing the actual method
        if (in_array($method, ['DELETE', 'PATCH', 'PUT'])) {
            $form = $form->addChild(static::hidden('_method')->value($method));
        }

        // On any other method that get, the form needs a CSRF token
        if ($method === 'GET') {
            $form = $form->addChild(static::token());
        }

        // If there's a model bound to the html builder, we'll unset it after
        // the form gets closed
        if ($this->model) {
            $form = $form->onClose(function () {
                $this->endModel();
            });
        }

        return $form
            ->method($method === 'GET' ? 'GET' : 'POST')
            ->action($action ? $this->urlGenerator->action($action, $parameters) : $action);
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
     * @param string $name
     * @param iterable $options
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Select
     */
    public function select(string $name = '', iterable $options = [], string $value = '')
    {
        return Select::create()
            ->options($options)
            ->value($name ? $this->old($name, $value) : $value);
    }

    /**
     * @return \Spatie\Html\Elements\Span
     */
    public function span()
    {
        return Span::create();
    }

    /**
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function submit(string $value = '')
    {
        return static::input('submit')->value($value);
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
     * @param string $name
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Textarea
     */
    public function textarea(string $name = '', string $value = '')
    {
        return Textarea::create()
            ->name($name)
            ->value($name ? $this->old($name, $value) : $value);
    }

    /**
     * @return \Spatie\Html\Elements\Input
     */
    public function token()
    {
        return static::hidden('_token')->value($this->session->token());
    }

    /**
     * @param \ArrayAccess|array $model
     *
     * @return $this
     */
    public function model($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return $this
     */
    public function endModel()
    {
        $this->model = null;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function old(string $name, string $value = ''): string
    {
        // If there's no default value provided, and the html builder currently
        // has a model assigned, try to retrieve a value from the model.
        if (empty($value) && $this->model) {
            $value = $this->model[$name] ?? '';
        }

        return $this->request->old($name, $value);
    }
}
