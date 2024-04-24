<?php

use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;
use Spatie\Html\BaseElement;
use Spatie\Html\Exceptions\InvalidChild;
use Spatie\Html\Exceptions\InvalidHtml;
use Spatie\Html\Exceptions\MissingTag;

uses(PHPUnit\Framework\TestCase::class);

class Div extends BaseElement
{
    protected $tag = 'div';
}

$wrapInDiv = function (string $text): Div {
    return Div::create()->text($text);
};

it("can't be instantiated without a tag name on the class", function () {
    new class () extends BaseElement {
    };
})->throws(MissingTag::class);

it('can be rendered to html')
    ->assertHtmlStringEqualsHtmlString(
        '<div></div>',
        Div::create()->toHtml()
    );

it('can set an attribute with set attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<div foo="bar"></div>',
        Div::create()->attribute('foo', 'bar')->render()
    );

it('can set an attribute to null')
    ->assertHtmlStringEqualsHtmlString(
        '<div foo=""></div>',
        Div::create()->attribute('foo', null)->render()
    );

it('can set an attribute with attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<div foo="bar"></div>',
        Div::create()->attribute('foo', 'bar')->render()
    );

it('can set an attribute with attribute if')
    ->assertHtmlStringEqualsHtmlString(
        '<div foo="bar"></div>',
        Div::create()->attributeIf(true, 'foo', 'bar')->attributeIf(false, 'bar', 'baz')->render()
    )
    ->assertHtmlStringEqualsHtmlString(
        '<div foo="bar"></div>',
        Div::create()->attributeUnless(false, 'foo', 'bar')->attributeUnless(true, 'bar', 'baz')->render()
    );


it('can set an class with class if')
    ->assertHtmlStringEqualsHtmlString(
        '<div class="bar"></div>',
        Div::create()->classIf(true, 'bar')->classIf(false, 'baz')->render()
    );

it('can not accept any if method')
    ->tap(fn () => Div::create()->barIf(true, 'bar')->render())
    ->throws(BadMethodCallException::class);

it('can forget an attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<div></div>',
        Div::create()->attribute('foo', 'bar')->forgetAttribute('foo')->render()
    );

it('can get an attribute', function () {
    $element = Div::create()->attribute('foo', 'bar');

    expect($element->getAttribute('foo'))->toEqual('bar');
});

it('can set an id')
    ->assertHtmlStringEqualsHtmlString(
        '<div id="main"></div>',
        Div::create()->id('main')->render()
    );

test('multiple attributes can be set with attributes')
    ->assertHtmlStringEqualsHtmlString(
        '<div foo bar="baz"></div>',
        Div::create()->attributes(['foo', 'bar' => 'baz'])->render()
    );

it('can add a class with add class')
    ->assertHtmlStringEqualsHtmlString(
        '<div class="foo"></div>',
        Div::create()->addClass('foo')->render()
    )
    ->assertHtmlStringEqualsHtmlString(
        '<div class="foo bar"></div>',
        Div::create()->addClass(['foo', 'bar'])->render()
    )
    ->assertHtmlStringEqualsHtmlString(
        '<div class="foo"></div>',
        Div::create()->addClass(['foo', 'bar' => false])->render()
    );


it('can add a class with class')
    ->assertHtmlStringEqualsHtmlString(
        '<div class="foo"></div>',
        Div::create()->class('foo')->render()
    );

it('can set style from a string')
    ->assertHtmlStringEqualsHtmlString(
        '<div style="color: red"></div>',
        Div::create()->style('color: red')->render()
    );

it('can set style from an array')
    ->assertHtmlStringEqualsHtmlString(
        '<div style="color: red"></div>',
        Div::create()->style(['color' => 'red'])->render()
    );

it('can set text')
    ->assertHtmlStringEqualsHtmlString(
        '<div>Hi &amp; Bye</div>',
        Div::create()->text('Hi & Bye')->render()
    );

it('can set html')
    ->assertHtmlStringEqualsHtmlString(
        '<div><span>Yo</span></div>',
        Div::create()->html('<span>Yo</span>')->render()
    );

it('can set HTML from Htmlstring')
    ->assertHtmlStringEqualsHtmlString(
        '<div><span>Yo</span></div>',
        Div::create()->html(new HtmlString('<span>Yo</span>'))->render()
    );

it("can't set HTML if it's not an HTML element")
    ->tap(fn () => Div::create()->html(true)->render())
    ->throws(InvalidChild::class);

test('setting text overwrites existing children')
    ->assertHtmlStringEqualsHtmlString(
        '<div>Hi</div>',
        Div::create()->addChild(Div::create())->text('Hi')->render()
    );

it("can't add child if it's not an HTML element or a string")
    ->tap(fn () => Div::create()->addChild(true)->render())
    ->throws(InvalidChild::class);

it("can't set text if it's a void element", function () {
    $img = new class () extends BaseElement {
        protected $tag = 'img';
    };

    $img->text('Hi');
})->throws(InvalidHtml::class);

it('can add a child from a string')
    ->assertHtmlStringEqualsHtmlString(
        '<div>Hello</div>',
        Div::create()->addChildren('Hello')
    );

it('can add a child from an element')
    ->assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div></div>',
        Div::create()->addChildren(Div::create()->text('Hello'))
    );

it('can add children from an array of strings')
    ->assertHtmlStringEqualsHtmlString(
        '<div>Helloworld</div>',
        Div::create()->addChildren(['Hello', 'world'])
    );

it('can add children from an array of elements')
    ->assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div><div>World</div></div>',
        Div::create()->addChildren([Div::create()->text('Hello'), Div::create()->text('World')])
    );

it('can add children from an iterable', function () {
    $children = Collection::make([Div::create()->text('Hello'), Div::create()->text('World')]);

    assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div><div>World</div></div>',
        Div::create()->addChildren($children)
    );
});

it("doesn't add a child if the child is null")
    ->assertHtmlStringEqualsHtmlString(
        '<div></div>',
        Div::create()->addChildren(null)
    );

it("can transform children when they're added", function () use ($wrapInDiv) {
    assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div><div>World</div></div>',
        Div::create()->addChildren(['Hello', 'World'], $wrapInDiv)
    );

    assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div><div>World</div></div>',
        Div::create()->addChild(['Hello', 'World'], $wrapInDiv)
    );

    assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div><div>World</div></div>',
        Div::create()->child(['Hello', 'World'], $wrapInDiv)
    );

    assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div><div>World</div></div>',
        Div::create()->children(['Hello', 'World'], $wrapInDiv)
    );
});

it('can add a child with add child')
    ->assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div></div>',
        Div::create()->addChild(Div::create()->text('Hello'))
    );

it('can add a child with child')
    ->assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div></div>',
        Div::create()->child(Div::create()->text('Hello'))
    );

it('can add children with children')
    ->assertHtmlStringEqualsHtmlString(
        '<div><div>Hello</div></div>',
        Div::create()->children(Div::create()->text('Hello'))
    );

it('can prepend children with prepend children')
    ->assertHtmlStringEqualsHtmlString(
        '<div><div>World</div><div>Hello</div></div>',
        Div::create()
            ->addChildren(Div::create()->text('Hello'))
            ->prependChildren(Div::create()->text('World'))
    );

it('can prepend children with prepend child')
    ->assertHtmlStringEqualsHtmlString(
        '<div><div>World</div><div>Hello</div></div>',
        Div::create()
            ->addChild(Div::create()->text('Hello'))
            ->prependChild(Div::create()->text('World'))
    );

it("can transform children when they're prepended", function () use ($wrapInDiv) {
    assertHtmlStringEqualsHtmlString(
        '<div><div>World</div><div>Hello</div></div>',
        Div::create()
            ->addChildren(Div::create()->text('Hello'))
            ->prependChildren(['World'], $wrapInDiv)
    );

    assertHtmlStringEqualsHtmlString(
        '<div><div>World</div><div>Hello</div></div>',
        Div::create()
            ->addChild(Div::create()->text('Hello'))
            ->prependChild('World', $wrapInDiv)
    );
});

it('can conditionally transform an element', function () {
    $div = Div::create()
        ->if(true, function (Div $div) {
            return $div->addClass('foo');
        })
        ->if(false, function (Div $div) {
            return $div->addClass('bar');
        });

    assertHtmlStringEqualsHtmlString('<div class="foo"></div>', $div);

    $div = Div::create()
        ->unless(false, function (Div $div) {
            return $div->addClass('foo');
        })
        ->unless(true, function (Div $div) {
            return $div->addClass('bar');
        });

    assertHtmlStringEqualsHtmlString('<div class="foo"></div>', $div);
});

it('can set a data attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<div data-foo="bar"></div>',
        Div::create()->data('foo', 'bar')->render()
    );

it('can set a aria attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<div aria-describedby="bar"></div>',
        Div::create()->aria('describedby', 'bar')->render()
    );
