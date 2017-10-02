<?php

namespace Spatie\Html\Test;

use Spatie\Html\BaseElement;
use Illuminate\Support\Collection;
use Spatie\Html\Exceptions\MissingTag;
use Spatie\Html\Exceptions\InvalidHtml;

class BaseElementTest extends TestCase
{
    /** @test */
    public function it_cant_be_instantiated_without_a_tag_name_on_the_class()
    {
        $this->expectException(MissingTag::class);

        new class extends BaseElement {
        };
    }

    /** @test */
    public function it_can_be_rendered_to_html()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::create()->toHtml()
        );
    }

    /** @test */
    public function it_can_set_an_attribute_with_set_attribute()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            Div::create()->attribute('foo', 'bar')->render()
        );
    }

    /** @test */
    public function it_can_set_an_attribute_to_null()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div foo=""></div>',
            Div::create()->attribute('foo', null)->render()
        );
    }

    /** @test */
    public function it_can_set_an_attribute_with_attribute()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            Div::create()->attribute('foo', 'bar')->render()
        );
    }

    /** @test */
    public function it_can_set_an_attribute_with_attribute_if()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div foo="bar"></div>',
            Div::create()->attributeIf(true, 'foo', 'bar')->attributeIf(false, 'bar', 'baz')->render()
        );
    }

    /** @test */
    public function it_can_forget_an_attribute()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::create()->attribute('foo', 'bar')->forgetAttribute('foo')->render()
        );
    }

    /** @test */
    public function it_can_get_an_attribute()
    {
        $element = Div::create()->attribute('foo', 'bar');

        $this->assertEquals('bar', $element->getAttribute('foo'));
    }

    /** @test */
    public function it_can_set_an_id()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div id="main"></div>',
            Div::create()->id('main')->render()
        );
    }

    /** @test */
    public function multiple_attributes_can_be_set_with_attributes()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div foo bar="baz"></div>',
            Div::create()->attributes(['foo', 'bar' => 'baz'])->render()
        );
    }

    /** @test */
    public function it_can_add_a_class_with_add_class()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div class="foo"></div>',
            Div::create()->addClass('foo')->render()
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<div class="foo bar"></div>',
            Div::create()->addClass(['foo', 'bar'])->render()
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<div class="foo"></div>',
            Div::create()->addClass(['foo', 'bar' => false])->render()
        );
    }

    /** @test */
    public function it_can_add_a_class_with_class()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div class="foo"></div>',
            Div::create()->class('foo')->render()
        );
    }

    /** @test */
    public function it_can_set_style_from_a_string()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div style="color: red"></div>',
            Div::create()->style('color: red')->render()
        );
    }

    /** @test */
    public function it_can_set_style_from_an_array()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div style="color: red"></div>',
            Div::create()->style(['color' => 'red'])->render()
        );
    }

    /** @test */
    public function it_can_set_text()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div>Hi &amp; Bye</div>',
            Div::create()->text('Hi & Bye')->render()
        );
    }

    /** @test */
    public function it_can_set_html()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><span>Yo</span></div>',
            Div::create()->html('<span>Yo</span>')->render()
        );
    }

    /** @test */
    public function setting_text_overwrites_existing_children()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div>Hi</div>',
            Div::create()->addChild(Div::create())->text('Hi')->render()
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

    /** @test */
    public function it_can_add_a_child_from_a_string()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div>Hello</div>',
            Div::create()->addChildren('Hello')
        );
    }

    /** @test */
    public function it_can_add_a_child_from_an_element()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div></div>',
            Div::create()->addChildren(Div::create()->text('Hello'))
        );
    }

    /** @test */
    public function it_can_add_children_from_an_array_of_strings()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div>Helloworld</div>',
            Div::create()->addChildren(['Hello', 'world'])
        );
    }

    /** @test */
    public function it_can_add_children_from_an_array_of_elements()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::create()->addChildren([Div::create()->text('Hello'), Div::create()->text('World')])
        );
    }

    /** @test */
    public function it_can_add_children_from_an_iterable()
    {
        $children = Collection::make([Div::create()->text('Hello'), Div::create()->text('World')]);

        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::create()->addChildren($children)
        );
    }

    /** @test */
    public function it_doesnt_add_a_child_if_the_child_is_null()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div></div>',
            Div::create()->addChildren(null)
        );
    }

    /** @test */
    public function it_can_transform_children_when_theyre_added()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::create()->addChildren(['Hello', 'World'], [$this, 'wrapInDiv'])
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::create()->addChild(['Hello', 'World'], [$this, 'wrapInDiv'])
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::create()->child(['Hello', 'World'], [$this, 'wrapInDiv'])
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div><div>World</div></div>',
            Div::create()->children(['Hello', 'World'], [$this, 'wrapInDiv'])
        );
    }

    /** @test */
    public function it_can_add_a_child_with_add_child()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div></div>',
            Div::create()->addChild(Div::create()->text('Hello'))
        );
    }

    /** @test */
    public function it_can_add_a_child_with_child()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div></div>',
            Div::create()->child(Div::create()->text('Hello'))
        );
    }

    /** @test */
    public function it_can_add_children_with_children()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>Hello</div></div>',
            Div::create()->children(Div::create()->text('Hello'))
        );
    }

    /** @test */
    public function it_can_prepend_children_with_prepend_children()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>World</div><div>Hello</div></div>',
            Div::create()
                ->addChildren(Div::create()->text('Hello'))
                ->prependChildren(Div::create()->text('World'))
        );
    }

    /** @test */
    public function it_can_prepend_children_with_prepend_child()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>World</div><div>Hello</div></div>',
            Div::create()
                ->addChild(Div::create()->text('Hello'))
                ->prependChild(Div::create()->text('World'))
        );
    }

    /** @test */
    public function it_can_transform_children_when_theyre_prepended()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>World</div><div>Hello</div></div>',
            Div::create()
                ->addChildren(Div::create()->text('Hello'))
                ->prependChildren(['World'], [$this, 'wrapInDiv'])
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<div><div>World</div><div>Hello</div></div>',
            Div::create()
                ->addChild(Div::create()->text('Hello'))
                ->prependChild('World', [$this, 'wrapInDiv'])
        );
    }

    /** @test */
    public function it_can_conditionally_transform_an_element()
    {
        $div = Div::create()
            ->if(true, function (Div $div) {
                return $div->addClass('foo');
            })
            ->if(false, function (Div $div) {
                return $div->addClass('bar');
            });

        $this->assertHtmlStringEqualsHtmlString('<div class="foo"></div>', $div);
    }

    public function wrapInDiv(string $text): Div
    {
        return Div::create()->text($text);
    }
}

class Div extends BaseElement
{
    protected $tag = 'div';
}
