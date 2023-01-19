<?php

it('can create a button', function () {
    assertHtmlStringEqualsHtmlString(
        '<button></button>',
        $this->html->button()
    );
});

it('can create a button with contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<button>Hi</button>',
        $this->html->button('Hi')
    );
});

it('can create a button with html contents', function () {
    assertHtmlStringEqualsHtmlString(
        '<button><em>Hi</em></button>',
        $this->html->button('<em>Hi</em>')
    );
});

it('can create a button with a type', function () {
    assertHtmlStringEqualsHtmlString(
        '<button type="submit">Hi</button>',
        $this->html->button('Hi', 'submit')
    );
});

it('can create a button with a type and name', function () {
    assertHtmlStringEqualsHtmlString(
        '<button name="buttonname" type="submit">Hi</button>',
        $this->html->button('Hi', 'submit', 'buttonname')
    );
});
