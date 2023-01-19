<?php

it('can create a reset button', function () {
    assertHtmlStringEqualsHtmlString(
        '<button type="reset"></button>',
        $this->html->reset()
    );
});

it('can create a reset button with contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<button type="reset">Reset</button>',
        $this->html->reset('Reset')
    );
});
