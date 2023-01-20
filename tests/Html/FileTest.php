<?php

it('can create a file input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="file">',
        $this->html->file()
    );
});

it('can create a file input with a name', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="archives" type="file" name="archives">',
        $this->html->file('archives')
    );
});
