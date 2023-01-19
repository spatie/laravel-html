<?php

it('can create a submit button', function () {
    assertHtmlStringEqualsHtmlString(
        '<button type="submit"></button>',
        $this->html->submit()
    );
});

it('can create a submit button with contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<button type="submit">Send</button>',
        $this->html->submit('Send')
    );
});
