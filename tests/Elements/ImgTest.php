<?php

use Spatie\Html\Elements\Img;

it('can create an img')
    ->assertHtmlStringEqualsHtmlString(
        '<img>',
        Img::create()
    );

it('can create an img with an alt attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<img alt="Sleepy koala">',
        Img::create()->alt('Sleepy koala')
    );

it('can create an img with a src attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<img src="sleepy-koala.jpg">',
        Img::create()->src('sleepy-koala.jpg')
    );
