<?php

namespace Spatie\Html\Elements;

use Illuminate\Support\Traits\Macroable;
use Spatie\Html\BaseElement;

class Span extends BaseElement
{
    use Macroable;

    protected $tag = 'span';
}
