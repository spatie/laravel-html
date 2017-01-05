<?php

namespace Spatie\Html;

abstract class BaseElement
{
    /** @var string */
    protected $tag = '';

    /** @var \Spatie\Html\Attributes */
    protected $attributes;

    /** @var array */
    protected $children = [];

    public function __construct()
    {
        if (! $this->tag) {
            throw new Exception;
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

    /**
     * @param string|array $children
     *
     * @return static
     */
    public function setChildren($children)
    {
        $element = clone $this;

        $element->children =
            is_array($children) ?
                $children :
                [$children];

        return $element;
    }

    public function open(): string
    {
        return $this->attributes->isEmpty() ?
            '<'.$this->tag.'>' :
            '<'.$this->tag.' '.$this->attributes->render().'>';
    }

    public function renderChildren(): string
    {
        return implode('', array_map(function ($child) {
            if ($child instanceof Element) {
                return $child->render();
            }

            if (is_string($child)) {
                return $child;
            }

            throw new Exception();
        }, $this->children));
    }

    public function close(): string
    {
        return $this->isVoidElement() ?
            '' :
            '<'.$this->tag.'>';
    }

    public function render(): string
    {
        return $this->open().$this->renderChildren().$this->close();
    }

    public function isVoidElement() : bool
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
