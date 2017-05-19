<?php

namespace Spatie\Html\Test\Html;

class ClassTest extends TestCase
{
    /** @test */
    public function it_can_render_a_class_attribute_with_classes_based_on_conditions()
    {
        $classes = [
            'foo' => true,
            'bar' => false,
            'baz',
        ];

        $this->assertEquals('class="foo baz"', $this->html->class($classes));
    }

    /** @test */
    public function it_can_render_a_class_attribute_from_a_string()
    {
        $this->assertEquals('class="foo"', $this->html->class('foo'));
        $this->assertEquals('class="foo"', $this->html->class('foo foo'));
    }

    /** @test */
    public function it_can_render_a_class_attribute_from_a_collection()
    {
        $classes = collect([
            'foo' => true,
            'bar' => false,
        ]);

        $this->assertEquals('class="foo"', $this->html->class($classes));
    }
}
