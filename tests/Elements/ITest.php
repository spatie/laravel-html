<?php

use Spatie\Html\Elements\I;

it('it can create an i element')
    ->assertHtmlStringEqualsHtmlString(
        '<i></i>',
        I::create()
    );
