<?php

use Spatie\Html\Elements\File;

it('can create a file')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file">',
        File::create()
    );

it('can create an autofocused file')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" autofocus>',
        File::create()->autofocus()
    );

it('can create a file that has autofocus when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" autofocus>',
        File::create()->autofocus(true)
    );

it("won't create a file that has autofocus when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file">',
        File::create()->autofocus(false)
    );

it('can create an required file')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" required>',
        File::create()->required()
    );

it('can create a file with a name')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" name="file">',
        File::create()->name('file')
    );

it('can create a file with accept audio')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" accept="audio/*">',
        File::create()->accept(File::ACCEPT_AUDIO)
    )
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" accept="audio/*">',
        File::create()->acceptAudio()
    );;

it('can create a file with accept video')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" accept="video/*">',
        File::create()->accept(File::ACCEPT_VIDEO)
    )
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" accept="video/*">',
        File::create()->acceptVideo()
    );

it('can create a file with accept image')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" accept="image/*">',
        File::create()->accept(File::ACCEPT_IMAGE)
    )

    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" accept="image/*">',
        File::create()->acceptImage()
    );

it('can create a file with accept')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" accept=".jpg">',
        File::create()->accept('.jpg')
    );

it('can create a file with multiple')
    ->assertHtmlStringEqualsHtmlString(
        '<input type="file" multiple>',
        File::create()->multiple()
    );
