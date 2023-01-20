<?php

it('can create a mailto link', function () {
    assertHtmlStringEqualsHtmlString(
        '<a href="mailto:hello@example.com">hello@example.com</a>',
        $this->html->mailto('hello@example.com')
    );
});

it('can create a mailto link with contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<a href="mailto:hello@example.com">E-mail</a>',
        $this->html->mailto('hello@example.com', 'E-mail')
    );
});
