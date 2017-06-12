<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class Fieldset extends BaseElement
{
    use Macroable;

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
