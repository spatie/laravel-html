<?php

namespace Spatie\Html\Test\Html;

class ElementTest extends TestCase
{
    /** @test */
    public function it_can_create_an_element()
    {
        $this->assertEquals(
            '<foo></foo>',
            $this->html->element('foo')
        );
    }
}
