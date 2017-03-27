<?php

namespace Spatie\Html;

use Spatie\Html\Elements\A;
use Illuminate\Http\Request;
use Spatie\Html\Elements\Div;
use Spatie\Html\Elements\Form;
use Spatie\Html\Elements\Span;
use Spatie\Html\Elements\Input;
use Spatie\Html\Elements\Label;
use Spatie\Html\Elements\Button;
use Spatie\Html\Elements\Legend;
use Spatie\Html\Elements\Option;
use Spatie\Html\Elements\Select;
use Spatie\Html\Elements\Element;
use Spatie\Html\Elements\Fieldset;
use Spatie\Html\Elements\Textarea;
use Illuminate\Contracts\Support\Htmlable;

class Html
{
    /** @var \Illuminate\Http\Request */
    protected $request;

    /** @var \ArrayAccess|array */
    protected $model;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $href
     * @param string $text
     *
     * @return \Spatie\Html\Elements\A
     */
    public function a(?string $href, ?string $text = '')
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
    public function button(?string $text = '', ?string $type = 'button')
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
    public function checkbox(string $name = '', ?string $value = '1', ?bool $checked = false)
    {
        return $this->input('checkbox', $name)
            ->value($value)
            ->attributeIf($this->old($name, $checked), 'checked');
    }

    /**
     * @param \Spatie\Html\HtmlElement|string $contents
     *
     * @return \Spatie\Html\Elements\Div
     */
    public function div($contents = null)
    {
        return Div::create()->children($contents);
    }

    /**
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function email(string $name = '', ?string $value = '')
    {
        return $this->input('email', $name, $value);
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
    public function input(?string $type = '', string $name = '', ?string $value = '')
    {
        return Input::create()
            ->attributeIf($type, 'type', $type)
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->attributeIf($name, 'id', $this->fieldName($name))
            ->attributeIf($name, 'value', $this->old($name, $value));
    }

    /**
     * @param \Spatie\Html\HtmlElement|string $legend
     *
     * @return \Spatie\Html\Elements\Fieldset
     */
    public function fieldset($legend = null)
    {
        return $legend ?
            Fieldset::create()->legend($legend) :
            Fieldset::create();
    }

    /**
     * @param string $method
     * @param string $action
     * @param array $parameters
     *
     * @return \Spatie\Html\Elements\Form
     */
    public function form(string $method = 'POST', string $action = '')
    {
        $method = strtoupper($method);
        $form = Form::create();

        // If Laravel needs to spoof the form's method, we'll append a hidden
        // field containing the actual method
        if (in_array($method, ['DELETE', 'PATCH', 'PUT'])) {
            $form = $form->addChild($this->hidden('_method')->value($method));
        }

        // On any other method that get, the form needs a CSRF token
        if ($method !== 'GET') {
            $form = $form->addChild($this->token());
        }

        return $form
            ->method($method === 'GET' ? 'GET' : 'POST')
            ->attributeIf($action, 'action', $action);
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function hidden(string $name = '', ?string $value = '')
    {
        return $this->input('hidden', $name, $value);
    }

    /**
     * @param \Spatie\Html\HtmlElement|iterable|string|null $contents
     * @param string $for
     *
     * @return \Spatie\Html\Elements\Label
     */
    public function label($contents = null, string $for = '')
    {
        return Label::create()
            ->attributeIf($for, 'for', $this->fieldName($for))
            ->children($contents);
    }

    /**
     * @param \Spatie\Html\HtmlElement|string $contents
     *
     * @return \Spatie\Html\Elements\Legend
     */
    public function legend($contents = null)
    {
        return Legend::create()->html($contents);
    }

    /**
     * @param string $email
     * @param string $text
     *
     * @return \Spatie\Html\Elements\A
     */
    public function mailto(string $email, string $text = '')
    {
        return $this->a('mailto:'.$email, $text);
    }

    /**
     * @param string $text
     * @param string $value
     * @param bool $selected
     *
     * @return \Spatie\Html\Elements\Option
     */
    public function option(?string $text = '', ?string $value = '', $selected = false)
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
    public function password(string $name = '')
    {
        return $this->input('password', $name)->value('');
    }

    /**
     * @param string $name
     * @param iterable $options
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Select
     */
    public function select(string $name = '', iterable $options = [], ?string $value = '')
    {
        return Select::create()
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->attributeIf($name, 'id', $this->fieldName($name))
            ->options($options)
            ->value($name ? $this->old($name, $value) : '');
    }

    /**
     * @param \Spatie\Html\HtmlElement|string $contents
     *
     * @return \Spatie\Html\Elements\Span
     */
    public function span($contents = null)
    {
        return Span::create()->children($contents);
    }

    /**
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Button
     */
    public function submit(?string $text = '')
    {
        return $this->button($text, 'submit');
    }

    /**
     * @param string $number
     * @param string $text
     *
     * @return \Spatie\Html\Elements\A
     */
    public function tel(?string $number, ?string $text = '')
    {
        return $this->a('tel:'.$number, $text);
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Input
     */
    public function text(string $name = '', ?string $value = '')
    {
        return $this->input('text', $name, $value);
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return \Spatie\Html\Elements\Textarea
     */
    public function textarea(string $name = '', ?string $value = '')
    {
        return Textarea::create()
            ->attributeIf($name, 'name', $this->fieldName($name))
            ->attributeIf($name, 'id', $this->fieldName($name))
            ->value($this->old($name, $value));
    }

    /**
     * @return \Spatie\Html\Elements\Input
     */
    public function token()
    {
        return $this->hidden('_token')->value($this->request->session()->token());
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
     * @param \ArrayAccess|array $model
     * @param string $method
     * @param string $action
     *
     * @return \Spatie\Html\Elements\Form
     */
    public function modelForm($model, string $method = 'POST', string $action = ''): Form
    {
        $this->model($model);

        return $this->form($method, $action);
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
     * @return \Illuminate\Contracts\Support\Htmlable
     */
    public function closeModelForm(): Htmlable
    {
        $this->endModel();

        return $this->form()->close();
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    protected function old(string $name, ?string $value = '')
    {
        if (empty($name)) {
            return;
        }

        // If there's no default value provided, and the html builder currently
        // has a model assigned, try to retrieve a value from the model.
        if (empty($value) && $this->model) {
            $value = $this->model[$name] ?? '';
        }

        return $this->request->old($name, $value);
    }

    protected function fieldName(string $name): string
    {
        return $name;
    }

    protected function ensureModelIsAvailable()
    {
        if (empty($this->model)) {
            throw new Exception('Method requires a model to be set on the html builder');
        }
    }
}
