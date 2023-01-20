<?php

it('can create a password input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="password">',
        $this->html->password()
    );
});

it('can create a password input with a name', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="confirm_password" type="password" name="confirm_password">',
        $this->html->password('confirm_password')
    );
});
