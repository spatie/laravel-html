<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Div;
use Spatie\Html\Test\TestCase;

class DivTest extends TestCase
{
    /** @test */
    public function it_can_create_a_div()
    {
        assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::create()
        );
    }
}
