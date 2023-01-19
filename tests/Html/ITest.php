<?php

it('can create an i element', function () {
    assertHtmlStringEqualsHtmlString(
        '<i></i>',
        $this->html->i()
    );
});
