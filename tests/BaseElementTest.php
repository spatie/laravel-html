<?php

namespace Spatie\Html\Test;

use Spatie\Html\BaseElement;
use Spatie\Html\Exceptions\InvalidHtml;
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
            Element::create()->attribute('foo', 'bar')->render()
        );
    }

    /** @test */
    public function an_attribute_can_be_set_with_attribute()
    {
        $this->assertEquals(
            '<element foo="bar"></element>',
            Element::create()->attribute('foo', 'bar')->render()
        );
    }

    /** @test */
    public function multiple_attributes_can_be_set_with_attributes()
    {
        $this->assertEquals(
            '<element foo bar="baz"></element>',
            Element::create()->attributes(['foo', 'bar' => 'baz'])->render()
        );
    }


    /** @test */
    public function a_class_can_be_added_with_add_class()
    {
        $this->assertEquals(
            '<element class="foo"></element>',
            Element::create()->class('foo')->render()
        );

        $this->assertEquals(
            '<element class="foo bar"></element>',
            Element::create()->class(['foo', 'bar'])->render()
        );

        $this->assertEquals(
            '<element class="foo"></element>',
            Element::create()->class(['foo', 'bar' => false])->render()
        );
    }

    /** @test */
    public function it_can_set_text()
    {
        $this->assertEquals(
            '<element>Hi</element>',
            Element::create()->text('Hi')->render()
        );
    }

    /** @test */
    public function setting_text_overwrites_existing_children()
    {
        $this->assertEquals(
            '<element>Hi</element>',
            Element::create()->child(Element::create())->text('Hi')->render()
        );
    }

    /** @test */
    public function it_cant_set_text_if_its_a_void_element()
    {
        $this->expectException(InvalidHtml::class);

        $img = new class extends BaseElement {
            protected $tag = 'img';
        };

        $img->text('Hi');
    }
}

class Element extends BaseElement
{
    protected $tag = 'element';
}
