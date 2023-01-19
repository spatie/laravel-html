<?php

it('can create an empty option', function () {
    assertHtmlStringEqualsHtmlString(
        '<option value=""></option>',
        $this->html->option('')
    );
});

it('can create an option with text', function () {
    assertHtmlStringEqualsHtmlString(
        '<option value="">Hi</option>',
        $this->html->option('Hi')
    );
});

it('can create an option with text and a value', function () {
    assertHtmlStringEqualsHtmlString(
        '<option value="1">Hi</option>',
        $this->html->option('Hi', 1)
    );
});

it('can create a selected option with text and a value', function () {
    assertHtmlStringEqualsHtmlString(
        '<option selected value="1">Hi</option>',
        $this->html->option('Hi', 1, true)
    );
});
