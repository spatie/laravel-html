<?php

it('can create a form', function () {
    assertHtmlStringEqualsHtmlString(
        '<form method="POST"><input type="hidden" name="_token" value="abc"></form>',
        $this->html->form()
    );
});

it('can create a form with a custom action', function () {
    assertHtmlStringEqualsHtmlString(
        '<form method="POST" action="/submit">' .
            '<input type="hidden" name="_token" value="abc">
            </form>',
        $this->html->form('POST', '/submit')
    );
});

it('can create a form with a target', function () {
    assertHtmlStringEqualsHtmlString(
        '<form method="POST" action="/submit" target="_blank">' .
            '<input type="hidden" name="_token" value="abc">
            </form>',
        $this->html->form('POST', '/submit')->target('_blank')
    );
});

it('can create a form with a custom method that gets spoofed', function () {
    assertHtmlStringEqualsHtmlString(
        '<form action="/submit" method="POST">' .
            '<input type="hidden" name="_method" id="_method" value="DELETE">' .
            '<input type="hidden" name="_token" value="abc">' .
            '</form>',
        $this->html->form('DELETE', '/submit')
    );
});

it('can get value from a form', function () {
    $this->html->form('DELETE', '/submit');

    assertHtmlStringEqualsHtmlString(
        '<p>delete</p>',
        $this->html->value('_method', 'delete')
    );

    assertHtmlStringEqualsHtmlString(
        '<p>abc</p>',
        $this->html->value('_token', 'abc')
    );
});

it("doesn't render a token field when using a GET method", function () {
    assertHtmlStringEqualsHtmlString(
        '<form action="/submit" method="GET"></form>',
        $this->html->form('GET', '/submit')
    );
});

it('can create form with end model', function () {
    assertHtmlStringEqualsHtmlString(
        '<form action="submit" method="GET"></form>',
        $this->html->endModel()->form('GET', 'submit')
    );
});

it('can return close model form')
    ->expect(fn () => (string) $this->html->closeModelForm())
    ->toEqual('</form>');
