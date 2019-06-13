---
title: Core concepts
weight: 1
---

## `Element` classes

This package contains several element classes under the `Spatie\Html\Elements` namespace. It's possible to generate any HTML element with any attribute via these classes and the [fluent element methods](/laravel-html/v1/general-usage/element-methods).

`Element` classes on their own don't have any knowledge of the outside world. That's where the `Spatie\Html\Html` builder comes into play.

## `Html` Builder class

The `Spatie\Html\Html` builder is used to build proper HTML using its [builder methods](/laravel-html/v1/general-usage/html-builder). It will also couple `Spatie\Html\Elements` to other concepts like requests, sessions and models.

For example when building input fields the `Html` builder will pull old values from the session (on a failed form request) or use values of a given model for the `value` attribute of the input.

Because the `Html` builder will generally return `Spatie\Html\Elements`, you can chain most of the [elements' fluent methods](/laravel-html/v1/general-usage/element-methods) directly onto the builder.

## The Difference Between Builder Params and Element Methods

Say we're adding a text input field in a form that's bound to a model:

```php
{{ html()->model(new User(['name' => 'Sebastian'])) }}
{{ html()->text('name', 'Alex') }}
// <input type="text" name="name" id="name" value="Sebastian" />
```

Since we're passing the input field's name `name` to the builder, it will try to infer it from the model, filling in `Sebastian` despite us providing `Alex` as its value. If we want to ensure that `Alex` is the value of the input element, we need to set the value *after* the element has been created by the HTML builder.

```php
{{ html()->model(new User(['name' => 'Sebastian'])) }}
{{ html()->input('name')->value('Alex') }}
// <input type="text" name="name" id="name" value="Alex" />
```

Here, the builder creates a field, using `Sebastian` as its value. Afterwards, we chain a `value` call on the element object itself, which doesn't have any outside context, to overwrite the value, which was previously set, to `Alex`.

## Checking radio and checkboxes

To correctly check/uncheck radio and checkboxes use the `checked` method:

```php
{{ html()->model(new User(['title' => 'Mr'])) }}
{{ html()->radio('title')->value('Mr')->checked(old('title', $user->title === 'Mr')) }}
{{ html()->radio('title')->value('Ms')->checked(old('title', $user->title === 'Ms')) }}
// <input type="radio" name="title" value="Mr" checked="checked" />
// <input type="radio" name="title" value="Ms" />
```

## Rendering elements

Every `Element` instance can be rendered to an HTML string using the `render()` method or simply by using it in a string context.

```php
echo Div::render();
// "<div></div>"

$elementInstance = new Div();
$htmlString = (string) $elementInstance;
// $htmlString is now "<div></div>"
```

Since elements implement Laravel's `Htmlable` interface, we don't need to use any special tags to prevent the output from being escaped.

```html
{!! html()->div() !!} <!-- Not necessary! -->
{{ html()->div() }} <!-- This works too -->
```
