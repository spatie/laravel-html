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

- `function type(?string $type)`
- `function value(?string $value)`

## `Div`

## `Fieldset`

- `function legend(?string $contents)`

## `Form`

- `function action(?string $action)`
- `function method(?string $method)`
- `function acceptsFiles()`

## `Input`

- `function autofocus()`
- `function name(?string $name)`
- `function placeholder(?string $placeholder)`
- `function required()`
- `function type(?string $type)`
- `function value(?string $value)`

## `Label`

- `function for(?string $for)`

## `Legend`

## `Option`

- `function selected()`
- `function selectedIf(bool $condition)`
- `function unselected()`
- `function value(?string $value)`

## `Select`

- `function name(?string $name)`
- `function options(iterable $options)`
- `function value(?string $value)`
- `function applyValueToOptions()`

## `Span`

## `TextArea`

- `function autofocus()`
- `function name(?string $name)`
- `function value(?string $value)`
