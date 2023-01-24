<?php

use Spatie\Html\Elements\Button;

it('can create a button')
    ->assertHtmlStringEqualsHtmlString(
        '<button></button>',
        Button::create()
    );
;

it('can create a button with a type')
    ->assertHtmlStringEqualsHtmlString(
        '<button type="submit"></button>',
        Button::create()->type('submit')
    );
;

it('can create a button with a value')
    ->assertHtmlStringEqualsHtmlString(
        '<button value="1"></button>',
        Button::create()->value(1)
    );
;

it('can create a button with a name')
    ->assertHtmlStringEqualsHtmlString(
        '<button name="foo"></button>',
        Button::create()->name('foo')
    );

it('can create a button with a name and value')
    ->assertHtmlStringEqualsHtmlString(
        '<button name="foo" value="bar"></button>',
        Button::create()->name('foo')->value('bar')
    );

it('can disable a button')
    ->assertHtmlStringEqualsHtmlString(
        '<button disabled></button>',
        Button::create()->disabled()
    );
