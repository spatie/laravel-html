<?php

namespace Spatie\Html\Elements;

use Illuminate\Support\Traits\Macroable;
use Spatie\Html\BaseElement;

class Div extends BaseElement
{
    use Macroable;
    
    protected $tag = 'div';
}
