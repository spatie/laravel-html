<?php

namespace Spatie\Html\Test\Html;

it('it can create an a element', function () {
    assertHtmlStringEqualsHtmlString(
        '<a></a>',
        $this->html->a()
    );
});

it('can create an a element with a href', function () {
    assertHtmlStringEqualsHtmlString(
        '<a href="https://spatie.be"></a>',
        $this->html->a('https://spatie.be')
    );
});

it('can create an a element with a href and text contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<a href="https://spatie.be">Spatie</a>',
        $this->html->a('https://spatie.be', 'Spatie')
    );
});

it('can create an a element with a href and html contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<a href="https://spatie.be/open-source">Spatie <em>Open Source</em></a>',
        $this->html->a('https://spatie.be/open-source', 'Spatie <em>Open Source</em>')
    );
});

it('can create an a element with a target', function () {
    assertHtmlStringEqualsHtmlString(
        '<a target="_blank"></a>',
        $this->html->a()->target('_blank')
    );
});

it('can create an a element with a href and a target', function () {
    assertHtmlStringEqualsHtmlString(
        '<a href="https://spatie.be/open-source" target="_blank"></a>',
        $this->html->a('https://spatie.be/open-source')->target('_blank')
    );
});
