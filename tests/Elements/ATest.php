<?php

use Spatie\Html\Elements\A;

it('can create an a element')
    ->assertHtmlStringEqualsHtmlString(
        '<a></a>',
        A::create()
    );

test('can create an a element with a href')
    ->assertHtmlStringEqualsHtmlString(
        '<a href="https://spatie.be"></a>',
        A::create()->href('https://spatie.be')
    );

test('can create an a element with a target')
    ->assertHtmlStringEqualsHtmlString(
        '<a target="_blank"></a>',
        A::create()->target('_blank')
    );
;
