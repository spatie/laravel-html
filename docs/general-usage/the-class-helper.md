---
title: The class() helper
weight: 5
---

The `class` method on `Html` is a helper to render a `class` attribute similar to [Vue.js' `:class` property](https://vuejs.org/v2/guide/class-and-style.html#Object-Syntax).

It expects an array (or a `Collection`), and will toggle a set of classes depending on the values of the array.

```html
<div {{ html()->class(['foo', 'bar' => true, 'baz' => false]) }}>
```

```div
<div class="foo bar">
```

If there's just a value (non-associative), the class will always be added. Otherwise, the class—specified by the array key—will only appear in the list if the value evaluates to true (non-strict).
