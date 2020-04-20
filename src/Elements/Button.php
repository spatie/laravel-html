<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Spatie\Html\Elements\Attributes\Name;
use Spatie\Html\Elements\Attributes\Type;
use Spatie\Html\Elements\Attributes\Value;

class Button extends BaseElement
{
    use Value;
    use Name;
    use Type;

    protected $tag = 'button';
}
