<?php

namespace Spatie\Html;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Spatie\Html\Exceptions\InvalidChild;
use Spatie\Html\Exceptions\InvalidHtml;
use Spatie\Html\Exceptions\MissingTag;

abstract class BaseElement implements Htmlable, HtmlElement
{
    /** @var string */
    protected $tag;

    /** @var \Spatie\Html\Attributes */
    protected $attributes;

    /** @var \Illuminate\Support\Collection */
    protected $children;

    public function __construct()
    {
        if (empty($this->tag)) {
            throw MissingTag::onClass(static::class);
        }

        $this->attributes = new Attributes();
        $this->children = new Collection();
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
    public function attribute(string $attribute, ?string $value = '')
    {
        $element = clone $this;

        $element->attributes->setAttribute($attribute, (string) $value);

        return $element;
    }

    /**
     * @param bool $condition
     * @param string $attribute
     * @param string $value
     *
     * @return static
     */
    public function attributeIf(bool $condition, string $attribute, ?string $value = '')
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

    /**
     * @param string $attribute
     * @param mixed $fallback
     *
     * @return mixed
     */
    public function getAttribute(string $attribute, ?string $fallback = '')
    {
        return $this->attributes->getAttribute($attribute, $fallback);
    }

    /**
     * @param iterable|string $class
     *
     * @return static
     */
    public function class($class)
    {
        return $this->addClass($class);
    }

    /**
     * Alias for `class`.
     *
     * @param iterable|string $class
     *
     * @return static
     */
    public function addClass($class)
    {
        $element = clone $this;

        $element->attributes->addClass($class);

        return $element;
    }

    /**
     * @param string $id
     *
     * @return static
     */
    public function id(string $id)
    {
        return $this->attribute('id', $id);
    }

    /**
     * @param \Spatie\Html\HtmlElement|string|iterable|null $children
     * @param ?callable $mapper
     *
     * @return static
     */
    public function addChildren($children, callable $mapper = null)
    {
        if (is_null($children)) {
            return $this;
        }

        $children = $this->parseChildren($children, $mapper);

        $element = clone $this;

        $element->children = $element->children->merge($children);

        return $element;
    }

    /**
     * Alias for `addChidren`.
     *
     * @param \Spatie\Html\HtmlElement|string|iterable|null $children
     * @param ?callable $mapper
     *
     * @return static
     */
    public function addChild($child, callable $mapper = null)
    {
        return $this->addChildren($child, $mapper);
    }

    /**
     * Alias for `addChidren`.
     *
     * @param \Spatie\Html\HtmlElement|string|iterable|null $children
     * @param ?callable $mapper
     *
     * @return static
     */
    public function child($child, callable $mapper = null)
    {
        return $this->addChildren($child, $mapper);
    }

    /**
     * Alias for `addChidren`.
     *
     * @param \Spatie\Html\HtmlElement|string|iterable|null $children
     * @param ?callable $mapper
     *
     * @return static
     */
    public function children($children, callable $mapper = null)
    {
        return $this->addChildren($children, $mapper);
    }

    /**
     * @param \Spatie\Html\HtmlElement|string|iterable|null $children
     * @param ?callable $mapper
     *
     * @return static
     */
    public function prependChildren($children, callable $mapper = null)
    {
        $children = $this->parseChildren($children, $mapper);

        $element = clone $this;

        $element->children = $children->merge($element->children);

        return $element;
    }

    /**
     * Alias for `prependChildren`.
     *
     * @param \Spatie\Html\HtmlElement|string|iterable|null $children
     * @param ?callable $mapper
     *
     * @return static
     */
    public function prependChild($children, callable $mapper = null)
    {
        return $this->prependChildren($children, $mapper);
    }

    /**
     * @param string $text
     *
     * @return static
     */
    public function text(?string $text)
    {
        return $this->html(htmlentities($text, ENT_QUOTES, 'UTF-8', false));
    }

    /**
     * @param string $html
     *
     * @return static
     */
    public function html(?string $html)
    {
        if ($this->isVoidElement()) {
            throw new InvalidHtml("Can't set inner contents on `{$this->tag}` because it's a void element");
        }

        $element = clone $this;

        $element->children = new Collection([$html]);

        return $element;
    }

    /**
     * Condintionally transform the element. Note that since elements are
     * immutable, you'll need to return a new instance from the callback.
     *
     * @param bool $condition
     * @param callable $callback
     */
    public function if(bool $condition, callable $callback)
    {
        if ($condition) {
            return $callback($this);
        }

        return $this;
    }

    public function open(): Htmlable
    {
        $tag = $this->attributes->isEmpty()
            ? '<'.$this->tag.'>'
            : "<{$this->tag} {$this->attributes->render()}>";

        $children = $this->children->map(function ($child): string {
            if ($child instanceof HtmlElement) {
                return $child->render();
            }

            if (is_string($child)) {
                return $child;
            }

            throw InvalidChild::childMustBeAnHtmlElementOrAString();
        })->implode('');

        return new HtmlString($tag.$children);
    }

    public function close(): Htmlable
    {
        return new HtmlString(
            $this->isVoidElement()
                ? ''
                : "</{$this->tag}>"
        );
    }

    public function render(): Htmlable
    {
        return new HtmlString(
            $this->open().$this->close()
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
        $this->children = clone $this->children;
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function toHtml(): string
    {
        return $this->render();
    }

    protected function parseChildren($children, callable $mapper = null): Collection
    {
        if ($children instanceof HtmlElement) {
            $children = [$children];
        }

        $children = Collection::make($children);

        if ($mapper) {
            $children = $children->map($mapper);
        }

        $children = $children->filter();

        $this->guardAgainstInvalidChildren($children);

        return $children;
    }

    protected function guardAgainstInvalidChildren(Collection $children)
    {
        foreach ($children as $child) {
            if (( ! $child instanceof HtmlElement) && ( ! is_string($child))) {
                throw InvalidChild::childMustBeAnHtmlElementOrAString();
            }
        }
    }
}
