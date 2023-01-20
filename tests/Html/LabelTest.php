<?php

it('can create a label', function () {
    assertHtmlStringEqualsHtmlString(
        '<label></label>',
        $this->html->label()
    );
});

it('can create a label with contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<label>Hi</label>',
        $this->html->label('Hi')
    );
});

it('can create a label with html contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<label><em>Hi</em></label>',
        $this->html->label('<em>Hi</em>')
    );
});

it('can create a label with a custom for attribute', function () {
    assertHtmlStringEqualsHtmlString(
        '<label for="some_input_id">Hi</label>',
        $this->html->label('Hi', 'some_input_id')
    );
});

it('can create a label with integer content', function () {
    assertHtmlStringEqualsHtmlString(
        '<label>5000</label>',
        $this->html->label(5000)
    );
});

it('can create a label with float content', function () {
    assertHtmlStringEqualsHtmlString(
        '<label>5000.5</label>',
        $this->html->label(5000.5)
    );
});

it('can create a label with hexadecimal content', function () {
    assertHtmlStringEqualsHtmlString(
        '<label>291</label>',
        $this->html->label(0x123)
    );
});

it('can create a label with octal content', function () {
    assertHtmlStringEqualsHtmlString(
        '<label>209</label>',
        $this->html->label(0321)
    );
});
