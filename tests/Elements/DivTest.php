<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Div;

class DivTest extends TestCase
{
    /** @test */
    public function it_can_create_a_div()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::create()
        );
    }
}
