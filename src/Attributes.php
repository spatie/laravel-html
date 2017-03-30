<?php

namespace Spatie\Html;

use Spatie\Html\Helpers\Arr;

class Attributes
{
    /** @var array */
    protected $attributes = [];

    /** @var array */
    protected $classes = [];

    /**
     * @param iterable $attributes
     */
    public function setAttributes(iterable $attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if ($attribute === 'class') {
                $this->addClass($value);
                continue;
            }

            if (is_int($attribute)) {
                $attribute = $value;
                $value = '';
            }

            $this->setAttribute($attribute, (string) $value);
        }
    }

    /**
     * @param string $attribute
     * @param string $value
     */
    public function setAttribute(string $attribute, string $value = '')
    {
        if ($attribute === 'class') {
            $this->addClass($value);

            return $this;
        }

        $this->attributes[$attribute] = $value;
    }

    public function forgetAttribute(string $attribute)
    {
        if ($attribute === 'class') {
            $this->classes = [];

            return $this;
        }

        if (isset($this->attributes[$attribute])) {
            unset($this->attributes[$attribute]);
        }

        return $this;
    }

    public function getAttribute(string $attribute, string $fallback = null): ?string
    {
        if ($attribute === 'class') {
            return implode(' ', $this->classes);
        }

        return $this->attributes[$attribute] ?? $fallback;
    }

    /**
     * @param string|iterable $class
     */
    public function addClass($class)
    {
        $class = Arr::getToggledValues($class);

        $this->classes = array_unique(
            array_merge($this->classes, $class)
        );
    }

    public function isEmpty(): bool
    {
        return empty($this->attributes) && empty($this->classes);
    }

    public function toArray(): array
    {
        if (empty($this->classes)) {
            return $this->attributes;
        }

        return array_merge(['class' => implode(' ', $this->classes)], $this->attributes);
    }

    public function render(): string
    {
        if ($this->isEmpty()) {
            return '';
        }

        $attributeStrings = [];

        foreach ($this->toArray() as $attribute => $value) {
            if ($value === '') {
                $attributeStrings[] = $attribute;
                continue;
            }

            $value = htmlentities($value, ENT_QUOTES, 'UTF-8', false);

            $attributeStrings[] = "{$attribute}=\"{$value}\"";
        }

        return implode(' ', $attributeStrings);
    }
}
