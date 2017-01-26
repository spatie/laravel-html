<?php

namespace Spatie\Html;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;
use Spatie\Html\Exceptions\CannotRenderChild;
use Spatie\Html\Exceptions\InvalidHtml;
use Spatie\Html\Exceptions\MissingTag;
use Spatie\Html\Helpers\Arr;

abstract class BaseElement implements Htmlable, HtmlElement
{
    /** @var string */
    protected $tag;

    /** @var \Spatie\Html\Attributes */
    protected $attributes;

    /** @var array */
    protected $children = [];

    /** @var callable[] */
    protected $onClose = [];

    public function __construct()
    {
        if (empty($this->tag)) {
            throw MissingTag::onClass(static::class);
        }

        $this->attributes = new Attributes();
    }

    public static function create()
    {
        return new static();
    }

    /**
     * @param string $attribute
     * @param string $value
     *
     * @return static
     */
    public function attribute(string $attribute, string $value = '')
    {
        $element = clone $this;

        $element->attributes->setAttribute($attribute, $value);

        return $element;
    }

    /**
     * @param bool $condition
     * @param string $attribute
     * @param string $value
     *
     * @return static
     */
    public function attributeIf(bool $condition, string $attribute, string $value = '')
    {
        return $condition ?
            $this->attribute($attribute, $value) :
            $this;
    }

    /**
     * @param iterable $attributes
     *
     * @return static
     */
    public function attributes(iterable $attributes)
    {
        $element = clone $this;

        $element->attributes->setAttributes($attributes);

        return $element;
    }

    /**
     * @param string $attribute
     * @param string $value
     *
     * @return static
     */
    public function forgetAttribute(string $attribute)
    {
        $element = clone $this;

        $element->attributes->forgetAttribute($attribute);

        return $element;
    }

    public function getAttribute(string $attribute, string $fallback = '')
    {
        return $this->attributes->getAttribute($attribute, $fallback);
    }

    public function addClass($class)
    {
        $element = clone $this;

        $element->attributes->addClass($class);

        return $element;
    }

    public function class($class)
    {
        return $this->addClass($class);
    }

    /**
     * @param iterable $children
     * @param callable $mapper
     *
     * @return static
     */
    public function children(iterable $children, callable $mapper = null)
    {
        $element = clone $this;

        $children = $mapper ? Arr::map($children, $mapper) : $children;

        $element->children = $children;

        return $element;
    }

    public function child($child)
    {
        return $this->children([$child]);
    }

    /**
     * @param \Spatie\Html\HtmlElement|string $child
     *
     * @return static
     */
    public function addChild($child)
    {
        if ((! $child instanceof HtmlElement) && (! is_string($child))) {
            throw CannotRenderChild::childMustBeAnHtmlElementOrAString($child);
        }

        $element = clone $this;

        $element->children[] = $child;

        return $element;
    }

    /**
     * @param string $text
     *
     * @return static
     */
    public function text(string $text)
    {
        return $this->html(htmlentities($text, ENT_QUOTES, 'UTF-8', false));
    }

    /**
     * @param string $html
     *
     * @return static
     */
    public function html(string $html)
    {
        if ($this->isVoidElement()) {
            throw new InvalidHtml("Can't set inner contents on `{$this->tag}` because it's a void element");
        }

        $element = clone $this;

        $element->children = [$html];

        return $element;
    }

    public function onClose(callable $callback)
    {
        $element = clone $this;

        $element->onClose[] = $callback;

        return $element;
    }

    public function renderChildren(): HtmlAble
    {
        $children = Arr::map($this->children, function ($child) {
            if ($child instanceof HtmlElement) {
                return $child->render();
            }

            if (is_string($child)) {
                return $child;
            }

            throw CannotRenderChild::childMustBeAnHtmlElementOrAString($child);
        });

        return new HtmlString(implode('', $children));
    }

    public function open(): HtmlAble
    {
        return new HtmlString(
            $this->attributes->isEmpty()
                ? '<'.$this->tag.'>'
                : "<{$this->tag} {$this->attributes->render()}>"
        );
    }

    public function close(): HtmlAble
    {
        foreach ($this->onClose as $callback) {
            $callback();
        }

        return new HtmlString(
            $this->isVoidElement()
                ? ''
                : "</{$this->tag}>"
        );
    }

    public function render(): HtmlAble
    {
        return new HtmlString(
            $this->open().$this->renderChildren().$this->close()
        );
    }

    public function isVoidElement(): bool
    {
        return in_array($this->tag, [
            'area', 'base', 'br', 'col', 'embed', 'hr',
            'img', 'input', 'keygen', 'link', 'menuitem',
            'meta', 'param', 'source', 'track', 'wbr',
        ]);
    }

    public function __clone()
    {
        $this->attributes = clone $this->attributes;
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function toHtml()
    {
        return $this->render();
    }
}
