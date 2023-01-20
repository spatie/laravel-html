<?php

use Spatie\Html\Elements\Label;

it('can create a label')
    ->assertHtmlStringEqualsHtmlString(
        '<label></label>',
        Label::create()
    );

it('can create a label with a custom for attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<label for="some_input_id"></label>',
        Label::create()->for('some_input_id')
    );
