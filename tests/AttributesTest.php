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
}
