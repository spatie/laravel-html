<?php

it('can create a form from a model', function () {
    assertHtmlStringEqualsHtmlString(
        '<form method="POST">' .
            '<input name="_token" type="hidden" value="abc">' .
            '</form>',
        $this->html->modelForm([])
    );
});
