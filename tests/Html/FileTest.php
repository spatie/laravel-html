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

it('can create a file input with disabled when passing true', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="archives" type="file" name="archives" disabled="disabled">',
        $this->html->file('archives')->disabled(true)
    );
});
