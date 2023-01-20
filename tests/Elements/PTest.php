<?php

use Spatie\Html\Elements\P;

it('can create an p element')
    ->assertHtmlStringEqualsHtmlString(
        '<p></p>',
        P::create()
    );
