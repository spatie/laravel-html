<?php

namespace Spatie\Html\Test\Html;

class DivTest extends TestCase
{
    /** @test */
    public function it_can_create_a_div()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div></div>',
            $this->html->div()
        );
    }
}
