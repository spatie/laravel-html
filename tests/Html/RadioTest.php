<?php

it('can create a radio button', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="radio">',
        $this->html->radio()
    );
});

it('can create a radio button with a name', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="radio" name="my_radio" id="my_radio">',
        $this->html->radio('my_radio')
    );
});

it('can create a checked radio button with a name', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="radio" name="my_radio" id="my_radio" checked="checked">',
        $this->html->radio('my_radio', true)
    );
});

it('can create a radio button with a name and value', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="radio" name="my_radio" id="my_radio_1" checked="checked" value="1">',
        $this->html->radio('my_radio', true, 1)
    );
});

it('can create a radio button with a name and a zero value', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="radio" name="my_radio" id="my_radio_0" checked="checked" value="0">',
        $this->html->radio('my_radio', true, 0)
    );
});

it('can create multiple radio buttons and check the right value', function () {
    $this->html->model(['color' => 'green']);

    assertHtmlStringEqualsHtmlString(
        '<div>' .
            '<input type="radio" name="color" id="color_red" value="red">' .
            '<input type="radio" name="color" id="color_green" checked="checked" value="green">' .
            '<input type="radio" name="color" id="color_blue" value="blue">' .
            '</div>',
        $this->html->div([
            $this->html->radio('color', false, 'red'),
            $this->html->radio('color', false, 'green'),
            $this->html->radio('color', false, 'blue'),
        ])
    );
});

it('can create multiple radio buttons and check the zero value', function () {
    $this->html->model(['is_admin' => '0']);

    assertHtmlStringEqualsHtmlString(
        '<div>' .
            '<input type="radio" name="is_admin" id="is_admin_1" value="1">' .
            '<input type="radio" name="is_admin" id="is_admin_0" checked="checked" value="0">' .
            '</div>',
        $this->html->div([
            $this->html->radio('is_admin', false, '1'),
            $this->html->radio('is_admin', false, '0'),
        ])
    );
});

it('can create unchecked radio button with zero value', function () {
    assertHtmlStringEqualsHtmlString(
        '<div>' .
        '<input type="radio" name="my_radio" id="my_radio_0" value="0">' .
        '<input type="radio" name="my_radio" id="my_radio_1" checked="checked" value="1">' .
        '</div>',
        $this->html->div([
            $this->html->radio('my_radio', false, 0),
            $this->html->radio('my_radio', true, 1),
        ])
    );
});
