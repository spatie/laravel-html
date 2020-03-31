---
title: Element classes
weight: 3
---

This package includes some element classes out of the box, others can be created using the [generic `Spatie\Html\Elements\Element` class](#generic-codeelementcode). 

All elements can use the [base element methods](/laravel-html/v1/general-usage/element-methods). Some elements also have some element specific methods to easily set common attributes. These element specific methods can be found bellow.

## Generic `Element`

Any HTML element can be created from the generic `Spatie\Html\Elements\Element` class via the `withTag` method.

For example to create a `<p>` tag:

```php
echo Element::withTag('p')->text('This is the content!');
// "<p>This is the content!</p>"
```


## `A`

- `function href(?string $href)`

## `Button`

- `function name(?string $name)`
- `function type(?string $type)`
- `function value(?string $value)`

## `Div`

## `Fieldset`

- `function legend(?string $contents)`

## `File`
- `function accept(?string $value)`
- `function acceptAudio()`
- `function acceptImage()`
- `function acceptVideo()`
- `function autofocus()`
- `function multiple()`
- `function name(?string $name)`
- `function required()`

## `Form`

- `function action(?string $action)`
- `function method(?string $method)`
- `function acceptsFiles()`

## `I`

## `Img`

- `function alt(?string $alt)`
- `function src(?string $src)`

## `Input`

- `function autofocus()`
- `function checked($checked = true)`
- `function disabled($disabled = true)`
- `function name(?string $name)`
- `function placeholder(?string $placeholder)`
- `function readonly($readonly = true)`
- `function required($required = true)`
- `function size($size)`
- `function type(?string $type)`
- `function unchecked()`
- `function value(?string $value)`


## `Label`

- `function for(?string $for)`

## `Legend`

## `Optgroup`

- `function label(?string $label)`

## `Option`

- `function selected()`
- `function selectedIf(bool $condition)`
- `function unselected()`
- `function value(?string $value)`

## `Select`

- `function multiple()`
- `function name(?string $name)`
- `function optgroup(string $label, iterable $options)`
- `function options(iterable $options)`
- `function placeholder(?$text)`
- `function required()`
- `function value(?string $value)`

## `Span`

## `TextArea`

- `function autofocus()`
- `function name(?string $name)`
- `function placeholder(?string $placeholder)`
- `function required()`
- `function value(?string $value)`
