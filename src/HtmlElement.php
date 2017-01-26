<?php

namespace Spatie\Html;

use Illuminate\Contracts\Support\Htmlable;

interface HtmlElement
{
    public function render(): Htmlable;
}
