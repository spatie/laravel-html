---
title: HTML builder
weight: 2
---

## Building general elements

The following builder methods can be used to generate general HTML elements like links, `div`s, `span`s, etc... All these methods return instances of `Spatie\Html\Elements`. Of course all [element methods](/laravel-html/v1/general-usage/element-methods) are available on the returned instances.

- `function a($href = null, $text = null): A`
- `function button($text = null, $type = 'button'): Button`
- `function div($contents = null): Div`
- `function element($tag): Element`
- `function mailto($email, $text = null): A`
- `function span($contents = null): Span`
- `function tel($number, $text = null): A`


## Working with a model

You can couple the HTML builder to a model using the `model()` method. This way elements will be built with the given model and its attributes in mind. Generally speaking this simply means that form fields will automatically try to use the values from the corresponding model attributes.

```php
$user = new User(['name' => 'Johnny']);
html()->model($user);
echo html()->text('name');
// Outputs: <input type="text" name="name" value="Johnny">
```

If you're working with forms you can use the `modelForm()` and `closeModelForm()` helper methods to generate forms coupled to a model.

The `endModel()` method is used to stop using a given model to build elements.


## Form building

The HTML builder has some great methods for building entire forms. By default all fields in these forms will automatically use their corresponding `session()->old()` values if available.

### `form()` method

```php
function form($method = 'POST', $action = null)
```

The `form()` method will return a `Spatie\Html\Elements\Form` class. It will have the `_token` and `_method` fields as children by default.

Generally speaking you'll want to use this in combination with `open()` and `close()` to generate the opening and closing tags for the form in your template.

```html
{{ html()->form('PUT', '/update-url')->open() }}

    {{ html()->text('username') }}

{{ html()->form()->close() }}

<!-- This will output the following HTML code: -->

<form method="POST" action="/update-url">
    <input type="hidden" name="_token" value="ABC123">
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="username">
</form>
```

### Building a form with a model

To make things easier we've added the `modelForm()` and `closeModelForm()` methods to easily open and close a form that's coupled to a model. Under the hood the `model()` and `endModel()` methods are used.

```html
<!-- $user is an existing User names "Johnny" passed into the view -->
{{ html()->modelForm($user, 'PUT', '/update-url')->open() }}

    {{ html()->text('name') }}
    {{ html()->email('email')}}

{{ html()->closeModelForm() }}

<!-- This will output the following HTML code: -->

<form method="POST" action="/update-url">
    <input type="hidden" name="_token" value="ABC123">
    <input type="hidden" name="_method" value="PUT">
    <input type="text" name="name" value="Johnny">
    <input type="email" name="email" value="heres@johnny.com">
</form>
```

## Form-related elements

- `function checkbox($name = null, $checked = false, $value = '1'): Input`
- `function email($name = null, $value = null): Input`
- `function input($type = null, $name = null, $value = null): Input`
- `function fieldset($legend = null): Fieldset`
- `function hidden($name = null, $value = null): Input`
- `function label($contents = null, $for = null): Label`
- `function legend($contents = null): Legend`
- `function multiselect($name = null, $options = [], $value = null): Select`
- `function option($text = null, $value = null, $selected = false): Option`
- `function password($name = null): Input`
- `function radio($name = null, $checked = false, $value = null): Input`
- `function select($name = null, $options = [], $value = null): Select`
- `function submit($text = null): Button`
- `function text($name = null, $value = null): Input`
- `function textarea($name = null, $value = null): Textarea`
- `function token(): Input`
