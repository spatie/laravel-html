<?php

use Spatie\Html\Elements\Optgroup;

it('can create an optgroup')
    ->assertHtmlStringEqualsHtmlString(
        '<optgroup></optgroup>',
        Optgroup::create()
    );

it('can create an element with a label')
    ->assertHtmlStringEqualsHtmlString(
        '<optgroup label="Cats"></optgroup>',
        Optgroup::create()->label('Cats')
    );

it('can disable an optgroup')
    ->assertHtmlStringEqualsHtmlString(
        '<optgroup disabled></optgroup>',
        Optgroup::create()->disabled()
    );
