<?php

use Spatie\Html\Elements\Legend;

it('can create a legend')
    ->assertHtmlStringEqualsHtmlString(
        '<legend></legend>',
        Legend::create()
    );
