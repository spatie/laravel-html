---
title: Element methods
weight: 4
---

All `Spatie\Html\Elements` have some methods that make working with elements easy. All these methods can be chained together fluently and every method will return a new `Element` instance. This way you can preserve the original `Element` if necessary.

## Available methods

- [`attribute()`](#codeattributecode)
- [`attributes()`](#codeattributescode)
- [`forgetAttribute()`](#codeforgetattributecode)
- [`getAttribute()`](#codegetattributecode)
- [`class()`](#codeclasscode)
- [`id()`](#codeidcode)
- [`data()`](#codedatacode)
- [`child()` and `children()`](#codechildcode-and-codechildrencode)
- [`prependChild()` and `prependChildren()`](#codeprependchildcode-or-codeprependchildrencode)
- [`text()`](#codetextcode)
- [`if()`](#codeifcode)
- [`open()`](#codeopencode)
- [`close()`](#codeclosecode)
- [`render()`](#coderendercode)

You can also call all those methods with the suffix `If` in order to execute the method only if the first parameter is `true`.

```php
echo Div::classIf(true, 'row');
// "<div class="row"></div>"
echo Div::classIf(false, 'row');
// "<div></div>"
echo Div::attributeIf(50 > 100, 'data-custom', 'Attribute value');
// "<div></div>"
```

## `attribute()`

Sets an attribute on the element:

```php
echo Div::attribute('data-custom', 'Attribute value');
// "<div data-custom="Attribute value"></div>"
```

## `attributes()`

Sets multiple attributes from an array or collection:

```php
echo Div::attributes(['data-id' => '123', 'data-username' => 'John']);
// "<div data-id="123" data-username="John"></div>"
```

## `forgetAttribute()`

Remove an attribute from an element:

```php
echo Div::attribute('data-custom', 'Attribute value')
        ->forgetAttribute('data-custom');
// "<div></div>"
```

## `getAttribute()`

Get the value of an element's attribute:

```php
echo Div::attribute('data-custom', 'Attribute value')
        ->getAttribute('data-custom');
// "data-custom"
```
You may also specify a fallback value:

```php
echo Div::getAttribute('data-username', 'Unknown');
// "Unknown"
```

## `class()`

Adds a class to the element.

```php
echo Div::class('btn');
// "<div class="btn"></div>"
```

## `id()`

Sets the id of the element overwriting any previously set `id`s:

```php
echo Div::id('btn-123');
// "<div id="btn-123"></div>"
```

## `data()`

Add a data- attribute:
```php
echo Div::data('btn', 123);
// "<div data-btn="123"></div>"
```

## `child()` and `children()`

Adds one or more child elements to the element:

```php
echo Div::child(P::text('This is the first paragraph'))
// "<div><p>This is the first paragraph</p></div>"

echo Div::children([P::text('This is the first paragraph'), Span::text('Span content')])
// "<div><p>This is the first paragraph</p><span>Span content</span></div>"
```

You may also provide a mapper function that will be called for each child:

```php
$content = ['First paragraph', 'Second paragraph', 'Third paragraph'];
echo Div::children($content, function ($content) {
    return P::text($content); // A new `<p>` element will be created for each string and added as a child of `<div>`
});
// "<div><p>...</p><p>...</p><p>...</p></div>"
```

## `prependChild()` and `prependChildren()`

Prepends one or more child-elements before the existing children on the element.

```php
$paragraphOne = P::text('First');
$paragraphTwo = P::text('Second');
$divElement = Div::child($paragraphTwo)
                 ->preprendChild($paragraphOne);
// <div><p>First</p><p>Second</p></div>
```

Just like the `children()` method you may provide a mapper function as the second argument that will be called for each child to be prepended.



## `text()`

Sets the inner contents of the element. Any HTML will be escaped with `htmlentities()` (if you do wish to add inner HTML use `html()`).

```php
echo Div::text('This text is "ironic"');
// "<div>This text is &quot;ironic&quot;</div>"
```

## `if()`

Condintionally transform the element. Note that since elements are immutable, you'll need to return a new instance from the callback.

```php
echo Div::if(10000 > 9000, function ($divElement) {
    return $divElement->text('10.000 is over 9.000');
});
// "<div>10.000 is over 9.000</div>"
```

## `open()`

Returns the elements opening tag as a `Illuminate\Support\HtmlString` including all children.

```php
echo Div::child(P::text('First child'))->open();
// "<div><p>First child</p>"
```

In combination with the `close()` method this can be really useful for rendering forms:

```html
{{ Form::action('/post-url')->method('POST')->open() }}

<!-- Other form inputs here -->

{{ Form::close() }}
```

## `close()`

Returns the elements closing tag as a `Illuminate\Support\HtmlString` (if the element is not a void element like for example `<br>`).

```php
echo Div::child(P::text('First child'))->close();
// "</div>"
```

## `render()`

Returns the complete element including all children as a `Illuminate\Support\HtmlString`.

```php
echo Div::child(P::text('First child'))->render();
// "<div><p>First child</p></div>"
```
