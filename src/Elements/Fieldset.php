<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Fieldset extends BaseElement
{
    protected $tag = 'fieldset';

    /**
     * @param \Spatie\Html\HtmlElement|string $text
     *
     * @return static
     */
    public function legend($contents)
    {
        return $this->prependChild(
            Legend::create()->text($contents)
        );
    }
}
