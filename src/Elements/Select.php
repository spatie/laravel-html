<?php

namespace Spatie\Html\Elements;

use Exception;
use Spatie\Html\Arr;
use Spatie\Html\BaseElement;

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
        return $this->createChildrenFrom($options, function ($text, $value) {
            return Option::create()
                ->value($value)
                ->text($text)
                ->selectedIf($value === $this->value);
        });
    }

    /**
     * @param iterable|string $children
     *
     * @return static
     */
    public function children($children)
    {
        if (! is_iterable($children)) {
            throw new Exception;
        }

        foreach ($children as $child) {
            if (! $child instanceof Option) {
                throw new Exception;
            }
        }

        $element  = parent::children($children);

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
