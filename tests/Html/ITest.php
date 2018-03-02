<?php

namespace Spatie\Html\Test\Html;

class ITest extends TestCase
{
    /** @test */
    public function it_can_create_an_i_element()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<i></i>',
            $this->html->i()
        );
    }
}
