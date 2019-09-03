---
title: Introduction
weight: 1
---

This package helps you generate HTML using a clean, simple and easy to read API. All elements can be dynamically generated and put together. The HTML builder helps you generate dynamically assigned form elements based on your selected model, the session or a default value.

### Generating elements

For example creating a new `span` element with a class is super easy with the [fluent methods for elements](/laravel-html/v1/general-usage/element-methods):

 ```php
html()->span()->text('Hello world!')->class('fa fa-eye');
```

### Building forms

Here's a quick example that builds a basic form with an e-mail input:

```php
{{ html()->form('PUT', '/post')->open() }}

{{ html()->email('email')->placeholder('Your e-mail address') }}

{{ html()->form()->close() }}
```

The generated HTML will look like this:

```html
<form method="POST" action="/post">
    <input type="hidden" name="_method" id="_method" value="PUT">
    <input type="hidden" name="_token" id="_token" value="csrf_token_will_be_here">
    <input type="email" name="email" id="email" placeholder="Your e-mail address">
</form>
```

Notice how the hidden `_method` and `_token` fields were automatically added and filled? You'll never forget to add `csrf_field()` again because now you simply wont have to anymore!

Another common use case might be to fill an input element based on the value that was previously submitted (using `$request->old()`). Worry no more, this has been taken care of as well. The above code will automatically fill in the `email` field if `$session->old('email')` exists. Amazing.

### Models in the HTML builder

The HTML builder can also generate elements based on a model:

```php
{{ html()->model($user) }}

{{ html()->input('name') }}
```

The value of the `name` field will automatically be filled with the model's `name` property if available:

```html
<input type="text" name="name" id="name" value="John">
```

A "model" can be any object that implements `ArrayAccess` — anything from a complex Eloquent model to a plain array.
