<?php

namespace Spatie\Html\Test\Html;

it('can create a img tag with image source and alt', function () {
    assertHtmlStringEqualsHtmlString(
        '<img src="/path/to/image/file" alt="alt_value">',
        $this->html->img('/path/to/image/file', 'alt_value')
    );
});
