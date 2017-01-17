<?php

namespace Spatie\Html;

use Spatie\Html\Exceptions\CannotRenderChild;
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

    /**
     * @param string $attribute
     * @param string $value
     *
     * @return static
     */
    public function setAttribute(string $attribute, string $value)
    {
        $element = clone $this;

        $element->attributes->setAttribute($attribute, $value);

        return $element;
    }

    /**
     * Alias for `setAttribute`
     *
     * @param string $attribute
     * @param string $value
     *
     * @return \Spatie\Html\BaseElement
     */
    public function attribute(string $attribute, string $value)
    {
        return $this->setAttribute($attribute, $value);
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
     * @param string|iterable $children
     *
     * @return static
     */
    public function setChildren($children)
    {
        $element = clone $this;

        $element->children = is_iterable($children)
            ? $children
            : [$children];

        return $element;
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
