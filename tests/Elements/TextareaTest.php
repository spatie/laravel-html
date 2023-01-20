<?php

use Spatie\Html\Elements\Textarea;

it('can create a textarea')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea></textarea>',
        Textarea::create()
    );

it('can create an autofocused textarea')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea autofocus></textarea>',
        Textarea::create()->autofocus()
    );

it('can create a textarea with a placeholder')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea placeholder="Lorem ipsum"></textarea>',
        Textarea::create()->placeholder('Lorem ipsum')
    );

it('can create a textarea with a name')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea name="text"></textarea>',
        Textarea::create()->name('text')
    );

it('can create a required textarea')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea required>My epic</textarea>',
        Textarea::create()->value('My epic')->required()
    );

it('can create a textarea with a value')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea>My epic</textarea>',
        Textarea::create()->value('My epic')
    );

it('can create a textarea that is required when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea required>My epic</textarea>',
        Textarea::create()->value('My epic')->required(true)
    );

it("won't create a textarea that is required when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<textarea>My epic</textarea>',
        Textarea::create()->value('My epic')->required(false)
    );

it('can create a disabled textarea')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea disabled>My epic</textarea>',
        Textarea::create()->value('My epic')->disabled()
    );

it('can create a textarea that is disabled when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea disabled>My epic</textarea>',
        Textarea::create()->value('My epic')->disabled(true)
    );

it("won't create a textarea that is disabled when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<textarea>My epic</textarea>',
        Textarea::create()->value('My epic')->disabled(false)
    );

it('can create a readonly textarea')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea readonly>My epic</textarea>',
        Textarea::create()->value('My epic')->isReadonly()
    );

it('can create a textarea that is readonly when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea readonly>My epic</textarea>',
        Textarea::create()->value('My epic')->isReadonly(true)
    );

it("won't create a textarea that is readonly when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<textarea>My epic</textarea>',
        Textarea::create()->value('My epic')->isReadonly(false)
    );

it('can create a textarea with maxlength')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea maxlength="25">My epic</textarea>',
        Textarea::create()->value('My epic')->maxlength(25)
    );

it('can create a textarea with minlength')
    ->assertHtmlStringEqualsHtmlString(
        '<textarea minlength="25">My epic</textarea>',
        Textarea::create()->value('My epic')->minlength(25)
    );
