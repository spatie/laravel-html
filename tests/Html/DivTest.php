<?php

it('can create a div', function () {
    assertHtmlStringEqualsHtmlString(
        '<div></div>',
        $this->html->div()
    );
});

it('can create a div with integer content', function () {
    assertHtmlStringEqualsHtmlString(
        '<div>500</div>',
        $this->html->div(500)
    );
});

it('can create a div with float content', function () {
    assertHtmlStringEqualsHtmlString(
        '<div>500.5</div>',
        $this->html->div(500.5)
    );
});

it('can create a div with hexadecimal content', function () {
    assertHtmlStringEqualsHtmlString(
        '<div>420</div>',
        $this->html->div(0x1A4)
    );
});

it('can create a div with octal content', function () {
    assertHtmlStringEqualsHtmlString(
        '<div>420</div>',
        $this->html->div(0644)
    );
});
