<?php

use Spatie\Html\Elements\Option;

it('can render an empty version itself')
    ->assertHtmlStringEqualsHtmlString(
        '<option></option>',
        Option::create()->render()
    );

it('can render itself with a text and a value')
    ->assertHtmlStringEqualsHtmlString(
        '<option value="0">Choose...</option>',
        Option::create()->value('0')->text('Choose...')->render()
    );

it('can render itself in a selected state')
    ->assertHtmlStringEqualsHtmlString(
        '<option selected value="0">Choose...</option>',
        Option::create()->value('0')->text('Choose...')->selected('0')
    );

it('can unselect itself')
    ->assertHtmlStringEqualsHtmlString(
        '<option value="0">Choose...</option>',
        Option::create()->value('0')->text('Choose...')->selected('0')->unselected()
    );

it('can conditionally select itself')
    ->assertHtmlStringEqualsHtmlString(
        '<option selected value="0">Choose...</option>',
        Option::create()->value('0')->text('Choose...')->selectedIf(true)
    )
    ->assertHtmlStringEqualsHtmlString(
        '<option value="0">Choose...</option>',
        Option::create()->value('0')->text('Choose...')->selectedIf(false)
    );

it('can disable an optgroup')
    ->assertHtmlStringEqualsHtmlString(
        '<option disabled></option>',
        Option::create()->disabled()
    );
