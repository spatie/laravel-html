<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\I;
use Spatie\Html\Test\TestCase;

class ITest extends TestCase
{
    /** @test */
    public function it_can_create_an_i_element()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<i></i>',
            I::create()
        );
    }
}
