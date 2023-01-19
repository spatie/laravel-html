<?php

use Spatie\Html\Elements\Fieldset;

it('can create a fieldset')
    ->assertHtmlStringEqualsHtmlString(
        '<fieldset></fieldset>',
        Fieldset::create()
    );

it('can add a legend to the fieldset')
    ->assertHtmlStringEqualsHtmlString(
        '<fieldset><legend>Legend</legend></fieldset>',
        Fieldset::create()->legend('Legend')
    );

it('can disable a fieldset')
    ->assertHtmlStringEqualsHtmlString(
        '<fieldset disabled></fieldset>',
        Fieldset::create()->disabled()
    );
