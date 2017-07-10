<?php

namespace Spatie\Html\Test;

use Spatie\Html\Attributes;

class AttributesTest extends TestCase
{
    /** @test */
    public function it_starts_empty()
    {
        $attributes = new Attributes();

        $this->assertTrue($attributes->isEmpty());
        $this->assertEmpty($attributes->toArray());
        $this->assertEmpty($attributes->render());
    }

    /** @test */
    public function it_accepts_classes_as_strings()
    {
        $attributes = new Attributes();
        $attributes->addClass('foo bar');

        $this->assertArraySubset(
            ['class' => 'foo bar'],
            $attributes->toArray()
        );
    }

    /** @test */
    public function it_accepts_classes_as_an_array()
    {
        $attributes = new Attributes();
        $attributes->addClass(['foo', 'bar']);

        $this->assertArraySubset(
            ['class' => 'foo bar'],
            $attributes->toArray()
        );
    }

    /** @test */
    public function it_can_add_classes_conditionally_with_an_associative_array()
    {
        $attributes = new Attributes();
        $attributes->addClass([
            'foo' => true,
            'bar' => false,
        ]);

        $this->assertArraySubset(
            ['class' => 'foo'],
            $attributes->toArray()
        );
    }

    /** @test */
    public function it_can_simultaniously_add_classes_conditionally_and_non_conditionally()
    {
        $attributes = new Attributes();
        $attributes->addClass([
            'foo' => true,
            'bar' => false,
            'baz',
        ]);

        $this->assertArraySubset(
            ['class' => 'foo baz'],
            $attributes->toArray()
        );
    }

    /** @test */
    public function it_accepts_attributes()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('href', '#');

        $this->assertArraySubset(
            ['href' => '#'],
            $attributes->toArray()
        );
    }

    /** @test */
    public function it_accepts_attributes_without_values()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('required');

        $this->assertArraySubset(
            ['required' => null],
            $attributes->toArray()
        );
    }

    /** @test */
    public function it_can_forget_an_attribute()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('href', '#');
        $attributes->forgetAttribute('href');

        $this->assertNull($attributes->getAttribute('href'));
    }

    /** @test */
    public function it_can_forget_its_classes()
    {
        $attributes = new Attributes();
        $attributes->addClass('foo');
        $attributes->forgetAttribute('class');

        $this->assertEmpty($attributes->getAttribute('class'));
    }

    /** @test */
    public function it_can_get_an_attribute()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('foo', 'bar');

        $this->assertEquals('bar', $attributes->getAttribute('foo'));
    }

    /** @test */
    public function it_can_get_a_class_list()
    {
        $attributes = new Attributes();

        $this->assertEquals('', $attributes->getAttribute('class'));

        $attributes->addClass(['foo', 'bar']);

        $this->assertEquals('foo bar', $attributes->getAttribute('class'));
    }

    /** @test */
    public function it_returns_null_if_an_attribute_doesnt_exist()
    {
        $attributes = new Attributes();

        $this->assertNull($attributes->getAttribute('foo'));
    }

    /** @test */
    public function it_can_return_a_fallback_if_an_attribute_doesnt_exist()
    {
        $attributes = new Attributes();

        $this->assertEquals('bar', $attributes->getAttribute('foo', 'bar'));
    }

    /** @test */
    public function it_accepts_multiple_attributes()
    {
        $attributes = new Attributes();
        $attributes->setAttributes(['name' => 'email', 'required']);

        $this->assertArraySubset(
            ['name' => 'email', 'required' => null],
            $attributes->toArray()
        );
    }

    /** @test */
    public function it_can_be_rendered_when_empty()
    {
        $attributes = new Attributes();

        $this->assertEquals('', $attributes->render());
    }

    /** @test */
    public function it_can_be_rendered_with_an_attribute()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('foo', 'bar');

        $this->assertEquals('foo="bar"', $attributes->render());
    }

    /** @test */
    public function it_can_be_rendered_with_multiple_attributes()
    {
        $attributes = new Attributes();
        $attributes->setAttributes(['foo' => 'bar', 'baz' => 'qux']);

        $this->assertEquals('foo="bar" baz="qux"', $attributes->render());
    }

    /** @test */
    public function it_can_be_rendered_with_a_falsish_attribute()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('foo', '0');

        $this->assertEquals('foo="0"', $attributes->render());
    }

    /** @test */
    public function it_can_escape_values_when_rendered()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('foo', '<bar baz=""></bar>');

        $this->assertEquals('foo="&lt;bar baz=&quot;&quot;&gt;&lt;/bar&gt;"', $attributes->render());
    }

    /** @test */
    public function it_can_render_square_brackets()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('names[]', 'Sebastian');

        $this->assertEquals('names[]="Sebastian"', $attributes->render());
    }

    /** @test */
    public function it_can_determine_wether_an_attribute_exists()
    {
        $attributes = new Attributes();
        $attributes->setAttribute('foo', 'bar');

        $this->assertTrue($attributes->hasAttribute('foo'));
        $this->assertFalse($attributes->hasAttribute('bar'));
    }
}
