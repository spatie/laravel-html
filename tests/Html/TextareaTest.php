<?php

it('can create a textarea', function () {
    assertHtmlStringEqualsHtmlString(
        '<textarea></textarea>',
        $this->html->textarea()
    );
});

it('can create a textarea with a name', function () {
    assertHtmlStringEqualsHtmlString(
        '<textarea id="description" name="description"></textarea>',
        $this->html->textarea('description')
    );
});

it('can create a textarea with a value', function () {
    assertHtmlStringEqualsHtmlString(
        '<textarea id="description" name="description">Foo bar</textarea>',
        $this->html->textarea('description', 'Foo bar')
    );
});
