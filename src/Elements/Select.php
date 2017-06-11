<?php

namespace Spatie\Html\Elements;

use Spatie\Html\Selectable;
use Spatie\Html\BaseElement;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Select extends BaseElement
{
    /** @var string */
    protected $tag = 'select';

    /** @var array */
    protected $options = [];

    /** @var string|iterable */
    protected $value = '';

    /**
     * @return static
     */
    public function multiple()
    {
        $element = clone $this;

        $element = $element->attribute('multiple');

        $name = $element->getAttribute('name');

        if ($name && ! Str::endsWith($name, '[]')) {
            $element = $element->name($name . '[]');
        }

        $element->applyValueToOptions();

        return $element;
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public function name(?string $name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * @param iterable $options
     *
     * @return static
     */
    public function options(iterable $options)
    {
        return $this->addChildren($options, function ($text, $value) {
            return Option::create()
                ->value($value)
                ->text($text)
                ->selectedIf($value === $this->value);
        });
    }

    public function placeholder(string $text)
    {
        return $this->prependChild(
            Option::create()
                ->value('')
                ->text($text)
                ->selectedIf(! $this->hasSelection())
        );
    }

    /**
     * @param string|iterable $value
     *
     * @return static
     */
    public function value($value = null)
    {
        $element = clone $this;

        $element->value = $value;

        $element->applyValueToOptions();

        return $element;
    }

    protected function hasSelection(): bool
    {
        return $this->children->contains->hasAttribute('selected');
    }

    protected function applyValueToOptions()
    {
        $value = Collection::make($this->value);

        if (! $this->hasAttribute('multiple')) {
            $value = $value->take(1);
        }

        $this->children = $this->children->map(function ($child) use ($value) {
            if ($child instanceof Selectable) {
                return $child->selectedIf($value->contains($child->getAttribute('value')));
            }

            return $child;
        });
    }
}
