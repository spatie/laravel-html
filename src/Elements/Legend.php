<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class Legend extends BaseElement
{
    use Macroable;

    protected $tag = 'legend';
}
