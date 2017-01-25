<?php

namespace Spatie\Html\Elements;

use Exception;
use Spatie\Html\Arr;
use Spatie\Html\BaseElement;
use Spatie\Html\Exceptions\InvalidHtml;

class Select extends BaseElement
{
    /** @var string */
    protected $tag = 'select';

    /** @var array */
    protected $options = [];

    /** @var string */
    protected $value = '';

    /**
     * @param iterable $options
     *
     * @return static
     */
    public function options(iterable $options)
    {
        return $this->children($options, function ($text, $value) {
            return Option::create()
                ->value($value)
                ->text($text)
                ->selectedIf($value === $this->value);
        });
    }

    /**
     * @param iterable $children
     * @param callable $mapper
     *
     * @return static
     */
    public function children(iterable $children, callable $mapper = null)
    {
        $children = $mapper ? Arr::map($children, $mapper) : $children;

        foreach ($children as $child) {
            if (! $child instanceof Option) {
                throw new InvalidHtml('A select element can only contain options');
            }
        }

        $element = parent::children($children);

        $element->applyValueToOptions();

        return $element;
    }

    /**
     * @param string $value
     *
     * @return static
     */
    public function value(string $value)
    {
        $element = clone $this;

        $element->value = $value;

        $element->applyValueToOptions();

        return $element;
    }

    protected function applyValueToOptions()
    {
        $this->children = Arr::map($this->children, function ($child) {

            if ($child instanceof Option) {
                return $child->selectedIf($this->value === $child->getAttribute('value'));
            }

            return $child;
        });
    }
}
