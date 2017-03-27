<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Test\TestCase;
use Spatie\Html\Elements\Element;
use Spatie\Html\Exceptions\MissingTag;

class ElementTest extends TestCase
{
    /** @test */
    public function it_can_create_an_element_with_a_tag()
    {
        $this->assertEquals(
            '<foo></foo>',
            Element::withTag('foo')
        );
    }

    /** @test */
    public function it_cant_create_an_element_without_a_tag()
    {
        $this->expectException(MissingTag::class);

        Element::create();
    }
}
