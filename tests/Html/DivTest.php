<?php

namespace Spatie\Html\Test\Html;

use Spatie\Html\Test\TestCase;


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
