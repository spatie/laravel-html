<?php

it('can create a span', function () {
    assertHtmlStringEqualsHtmlString(
        '<span></span>',
        $this->html->span()
    );
});

it('can create a span with contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<span>Hi</span>',
        $this->html->span('Hi')
    );
});

it('can create a span with HTML contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<span><em>Hi</em></span>',
        $this->html->span('<em>Hi</em>')
    );
});

it('can create a span with integer content', function () {
    assertHtmlStringEqualsHtmlString(
        '<span>50</span>',
        $this->html->span(50)
    );
});

it('can create a span with float content', function () {
    assertHtmlStringEqualsHtmlString(
        '<span>50.5</span>',
        $this->html->span(50.5)
    );
});

it('can create a span with hexadecimal content', function () {
    assertHtmlStringEqualsHtmlString(
        '<span>1337</span>',
        $this->html->span(0x539)
    );
});

it('can create a span with octal content', function () {
    assertHtmlStringEqualsHtmlString(
        '<span>83</span>',
        $this->html->span(0123)
    );
});
