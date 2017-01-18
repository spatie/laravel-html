<?php

namespace Spatie\Html;

use Spatie\Html\Exceptions\CannotRenderChild;
use Spatie\Html\Exceptions\InvalidHtml;
use Spatie\Html\Exceptions\MissingTag;

abstract class BaseElement
{
    /** @var string */
    protected $tag;

    /** @var \Spatie\Html\Attributes */
    protected $attributes;

    /** @var array */
    protected $children = [];

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

    public function attribute(string $attribute, string $value)
    {
        $element = clone $this;

        $element->attributes->setAttribute($attribute, $value);

        return $element;
    }

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
     *
     * @return static
     */
    public function children($children)
    {
        $element = clone $this;

        $element->children = $children;

        return $element;
    }

    public function child($child)
    {
        return $this->children([$child]);
    }

    public function text(string $text)
    {
        if ($this->isVoidElement()) {
            throw new InvalidHtml("Can't set text on `{$this->tag}` because it's a void element");
        }

        $element = clone $this;

        $element->children = [$text];

        return $element;
    }

    /**
     * @param iterable $children
     * @param callable $callback
     *
     * @return static
     */
    public function createChildrenFrom(iterable $children, callable $callback)
    {
        return $this->children(Arr::map($children, $callback));
    }

    public function renderChildren(): string
    {
        return implode('', array_map(function ($child) {
            if ($child instanceof BaseElement) {
                return $child->render();
            }

            if (is_string($child)) {
                return $child;
            }

            throw CannotRenderChild::childMustBeABaseElementOrAString($child);
        }, $this->children));
    }

    public function open(): string
    {
        return $this->attributes->isEmpty()
            ? '<'.$this->tag.'>'
            : "<{$this->tag} {$this->attributes->render()}>";
    }

    public function close(): string
    {
        return $this->isVoidElement()
            ? ''
            : "</{$this->tag}>";
    }

    public function render(): string
    {
        return $this->open().$this->renderChildren().$this->close();
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
}
