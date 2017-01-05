<?php

namespace Spatie\Html\Elements;

use Exception;
use Spatie\Html\BaseElement;
use Spatie\Html\Html;

class Select extends BaseElement
{
    /** @var string */
    protected $tag = 'select';

    /** @var array */
    protected $options = [];

    /** @var string */
    protected $value = '';

    /**
     * @param array $options
     *
     * @return static
     */
    public function options(array $options)
    {
        return $this->setChildren(
            array_map(function ($value, $label) {
                return Html::option($value, $label)->selectedIf($value === $this->value);
            }, $options, array_keys($options))
        );
    }

    /**
     * @param array $children
     *
     * @return static
     */
    public function setChildren($children)
    {
        if (! is_array($children)) {
            throw new Exception;
        }

        foreach ($children as $child) {
            if (! $child instanceof Option) {
                throw new Exception;
            }
        }

        return parent::setChildren($children);
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

        return $element;
    }
}
