<?php

use Spatie\Html\Elements\Div;

it('can create a div')
    ->assertHtmlStringEqualsHtmlString(
        '<div></div>',
        Div::create()
    );
