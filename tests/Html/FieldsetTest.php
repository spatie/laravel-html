<?php

it('can create a fieldset', function () {
    assertHtmlStringEqualsHtmlString(
        '<fieldset></fieldset>',
        $this->html->fieldset()
    );
});

it('can create a fieldset with a legend', function () {
    assertHtmlStringEqualsHtmlString(
        '<fieldset><legend>Legend</legend></fieldset>',
        $this->html->fieldset('Legend')
    );
});

it('can add a legend to the fieldset', function () {
    assertHtmlStringEqualsHtmlString(
        '<fieldset><legend>Legend</legend></fieldset>',
        $this->html->fieldset()->legend('Legend')
    );
});
