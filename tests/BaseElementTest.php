<?php

namespace Spatie\Html\Test;

use Spatie\Html\BaseElement;
use Spatie\Html\Exceptions\MissingTag;

class BaseElementTest extends TestCase
{
    /** @test */
    public function it_cant_be_instantiated_without_a_tag_name_on_the_class()
    {
        $this->expectException(MissingTag::class);

        new class extends BaseElement {};
    }

    /** @test */
    public function an_attribute_can_be_set_with_set_attribute()
    {
        $this->assertEquals(
            '<element foo="bar"></element>',
            (new Element())->setAttribute('foo', 'bar')
        );
    }

    /** @test */
    public function an_attribute_can_be_set_with_attribute()
    {
        $this->assertEquals(
            '<element foo="bar"></element>',
            (new Element())->attribute('foo', 'bar')
        );
    }

    /** @test */
    public function multiple_attributes_can_be_set_with_attributes()
    {
        $this->assertEquals(
            '<element foo bar="baz"></element>',
            (new Element())->attributes(['foo', 'bar' => 'baz'])
        );
    }

    /** @test */
    public function a_class_can_be_added_with_add_class()
    {
        $this->assertEquals(
            '<element class="foo"></element>',
            (new Element())->class('foo')
        );

        $this->assertEquals(
            '<element class="foo bar"></element>',
            (new Element())->class(['foo', 'bar'])
        );

        $this->assertEquals(
            '<element class="foo"></element>',
            (new Element())->class(['foo', 'bar' => false])
        );
    }
}

class Element extends BaseElement
{
    protected $tag = 'element';
}
