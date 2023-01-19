<?php

it('can create a legend', function () {
    assertHtmlStringEqualsHtmlString(
        '<legend></legend>',
        $this->html->legend()
    );
});

it('can create a legend with contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<legend>Hi</legend>',
        $this->html->legend('Hi')
    );
});
