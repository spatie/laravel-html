<?php

use Spatie\Html\Elements\Form;

it('can create a form')
    ->assertHtmlStringEqualsHtmlString(
        '<form></form>',
        Form::create()
    );

it('can create a form with a custom action')
    ->assertHtmlStringEqualsHtmlString(
        '<form action="/submit"></form>',
        Form::create()->action('/submit')
    );

it('can create a form with a custom method')
    ->assertHtmlStringEqualsHtmlString(
        '<form method="POST"></form>',
        Form::create()->method('POST')
    );

it('can create a form that accepts files')
    ->assertHtmlStringEqualsHtmlString(
        '<form enctype="multipart/form-data"></form>',
        Form::create()->acceptsFiles()
    );

it('can create a form with a non-autocomplete attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<form autocomplete="off"></form>',
        Form::create()->autocomplete(false)
    );

it('can create a form with a novalidate attribute')
    ->assertHtmlStringEqualsHtmlString(
        '<form enctype="multipart/form-data" novalidate=""></form>',
        Form::create()->novalidate()->acceptsFiles()
    );

it('can create a form that has novalidate when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<form enctype="multipart/form-data" novalidate=""></form>',
        Form::create()->novalidate(true)->acceptsFiles()
    );

it("won't create a form that has novalidate when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<form enctype="multipart/form-data"></form>',
        Form::create()->novalidate(false)->acceptsFiles()
    );

it('can create a form with a target')
    ->assertHtmlStringEqualsHtmlString(
        '<form target="_blank"></form>',
        Form::create()->target('_blank')
    );
