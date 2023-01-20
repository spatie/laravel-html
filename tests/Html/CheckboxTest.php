<?php

it('can create a checkbox', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" value="1">',
        $this->html->checkbox()
    );
});

it('can create a checkbox with a name', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" name="my_checkbox" id="my_checkbox" value="1">',
        $this->html->checkbox('my_checkbox')
    );
});

it('can create a checked checkbox with a name', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="1">',
        $this->html->checkbox('my_checkbox', true)
    );
});

it('can create a checkbox with a name and a custom value', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="foo">',
        $this->html->checkbox('my_checkbox', true, 'foo')
    );
});

it('can create a checkbox with a name and a zero value', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" name="my_checkbox" id="my_checkbox" checked="checked" value="0">',
        $this->html->checkbox('my_checkbox', true, 0)
    );
});
