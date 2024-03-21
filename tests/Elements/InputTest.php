<?php

use Spatie\Html\Elements\Input;

it('can create an input')
    ->assertHtmlStringEqualsHtmlString(
        '<input>',
        Input::create()
    );

it('can create an input with a custom type')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="text">',
        Input::create()->type('text')
    );

it('can create an input with a name')
    ->assertHtmlStringEqualsHtmlString(
        '<input name="foo">',
        Input::create()->name('foo')
    );

it('can create an input with a value')
    ->assertHtmlStringEqualsHtmlString(
        '<input value="bar">',
        Input::create()->value('bar')
    );

it('can create an input with a placeholder')
    ->assertHtmlStringEqualsHtmlString(
        '<input placeholder="Foo bar">',
        Input::create()->placeholder('Foo bar')
    );

it('can create an input that is required')
    ->assertHtmlStringEqualsHtmlString(
        '<input required>',
        Input::create()->required()
    );

it('can create an input that is required when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<input required>',
        Input::create()->required(true)
    );

it("won't create an input that is required when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<input>',
        Input::create()->required(false)
    );

it('can create a non-autocompleted input')
    ->assertHtmlStringEqualsHtmlString(
        '<input autocomplete="off">',
        Input::create()->autocomplete(false)
    );

it('can create an input that has autofocus')
    ->assertHtmlStringEqualsHtmlString(
        '<input autofocus>',
        Input::create()->autofocus()
    );

it('can create an input that has autofocus when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<input autofocus>',
        Input::create()->autofocus(true)
    );

it("won't create an input that has autofocus when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<input>',
        Input::create()->autofocus(false)
    );

it('can check an input')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" checked="checked">',
        Input::create()->type('checkbox')->checked(true)
    )
    ->assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" checked="checked">',
        Input::create()->type('checkbox')->checked()
    );

it('can uncheck an input')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="checkbox">',
        Input::create()->type('checkbox')->checked()->checked(false)
    )
    ->assertHtmlStringEqualsHtmlString(
        '<input type="checkbox">',
        Input::create()->type('checkbox')->checked()->unchecked()
    );

it('can disable an input')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" disabled>',
        Input::create()->type('checkbox')->disabled()
    );

it('can create an input with maxlength')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="text" maxlength="25">',
        Input::create()->type('text')->maxlength(25)
    );

it('can create an input with minlength')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="text" minlength="25">',
        Input::create()->type('text')->minlength(25)
    );
