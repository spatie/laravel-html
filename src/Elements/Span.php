<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class Span extends BaseElement
{
    use Macroable;

    protected $tag = 'span';
}
