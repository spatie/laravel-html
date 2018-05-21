<?php

namespace Spatie\Html\Elements;

use Illuminate\Support\Str;
use Spatie\Html\Selectable;
use Spatie\Html\BaseElement;
use Illuminate\Support\Collection;

class Select extends BaseElement
{
    /** @var string */
    protected $tag = 'select';

    /** @var array */
    protected $options = [];

    /** @var string|iterable */
    protected $value = '';

    /**
     * @param bool $strict
     * @return static
     */
    public function multiple($strict = false)
    {
        $element = clone $this;

        $element = $element->attribute('multiple');

        $name = $element->getAttribute('name');

        if ($name && ! Str::endsWith($name, '[]')) {
            $element = $element->name($name.'[]');
        }

        $element->applyValueToOptions($strict);

        return $element;
    }

    /**
     * @param string|null $name
     *
     * @return static
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * @param iterable $options
     * @param bool $strict
     * @return static
     */
    public function options($options, $strict = false)
    {
        return $this->addChildren($options, function ($text, $value) use ($strict) {
            if (is_array($text)) {
                return $this->optgroup($value, $text, $strict);
            }

            return $this->createOption($text, $value, $strict);
        });
    }

    /**
     * @param string $label
     * @param iterable $options
     * @param bool $strict
     *
     * @return static
     */
    public function optgroup($label, $options, $strict = false)
    {
        return Optgroup::create()
            ->label($label)
            ->addChildren($options, function ($text, $value) use ($strict) {
                return $this->createOption($text, $value, $strict);
            });

        return $this->addChild($optgroup);
    }

    /**
     * @param string|null $text
     *
     * @return static
     */
    public function placeholder($text)
    {
        return $this->prependChild(
            $this->createOption($text, null)
                ->selectedIf(! $this->hasSelection())
        );
    }

    /**
     * @return static
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * @param string|iterable $value
     * @param bool $strict
     *
     * @return static
     */
    public function value($value = null, $strict = false)
    {
        $element = clone $this;

        $element->value = $value;

        $element->applyValueToOptions($strict);

        return $element;
    }

    protected function hasSelection()
    {
        return $this->children->contains->hasAttribute('selected');
    }

    protected function createOption($text, $value = null, $strict = false)
    {
        $selected = false;
        if (null !== $value) {
            $selected = $strict ?
                $value === $this->value :
                $value == $this->value;
        }

        return Option::create()
            ->value($value)
            ->text($text)
            ->selectedIf($selected);
    }

    protected function applyValueToOptions($strict = false)
    {
        $value = Collection::make($this->value);

        if (! $this->hasAttribute('multiple')) {
            $value = $value->take(1);
        }

        $this->children = $this->applyValueToElements($value, $this->children, $strict);
    }

    protected function applyValueToElements($value, Collection $children, $strict = false)
    {
        return $children->map(function ($child) use ($strict, $value) {
            if ($child instanceof Optgroup) {
                return $child->setChildren($this->applyValueToElements($value, $child->children, $strict));
            }

            if ($child instanceof Selectable) {
                $attribute = $child->getAttribute('value');
                $contains = $strict ?
                    $value->containsStrict($attribute) :
                    $value->contains($attribute);

                return $child->selectedIf($contains);
            }

            return $child;
        });
    }
}
