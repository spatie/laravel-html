<?php

namespace Spatie\Html\Elements;

use Illuminate\Support\Traits\Macroable;
use Spatie\Html\BaseElement;

class Legend extends BaseElement
{
    use Macroable;
    
    protected $tag = 'legend';
}
