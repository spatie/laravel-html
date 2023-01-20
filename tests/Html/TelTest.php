<?php

it('can create a tel link', function () {
    assertHtmlStringEqualsHtmlString(
        '<a href="tel:+19999999999">+19999999999</a>',
        $this->html->tel('+19999999999')
    );
});

it('can create a tel link with contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<a href="tel:+19999999999">Call me</a>',
        $this->html->tel('+19999999999', 'Call me')
    );
});
