<?php

use Illuminate\Support\Arr;

it('returns a session value if its available in the session', function () {
    withSession(['name' => 'Sebastian']);
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="name" id="name" value="Sebastian">',
        $this->html->text('name')
    );

    withSession(['number' => 0]);
    assertHtmlStringEqualsHtmlString(
        '<input type="number" name="number" id="number" value="0">',
        $this->html->input('number', 'number')
    );
});

it('returns a model value if its available in the model', function () {
    withModel(['name' => 'Sebastian']);
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="name" id="name" value="Sebastian">',
        $this->html->text('name')
    );

    withModel(['email' => 'sebastian@spatie.be']);
    assertHtmlStringEqualsHtmlString(
        '<input type="email" name="email" id="email" value="sebastian@spatie.be">',
        $this->html->email('email')
    );

    withModel(['number' => 0]);
    assertHtmlStringEqualsHtmlString(
        '<input type="number" name="number" id="number" value="0">',
        $this->html->input('number', 'number')
    );
});

it('returns specified value even if a model value its available in the model', function () {
    withModel(['name' => 'Sebastian']);
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="name" id="name" value="Freek">',
        $this->html->text('name', 'Freek')
    );

    withModel(['name' => 1]);
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="name" id="name" value="0">',
        $this->html->text('name', 0)
    );

    withModel(['name' => true]);
    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" name="name" id="name" value="1">',
        $this->html->checkbox('name', false)
    );
});

it('returns a session value if its available in the model and the session', function () {
    withModel(['name' => 'Freek']);
    withSession(['name' => 'Sebastian']);

    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="name" id="name" value="Sebastian">',
        $this->html->text('name')
    );
});

it('returns a session value from a name with an array', function () {
    withSession(Arr::dot(['name' => [1 => ['a' => 'Sebastian']]]));
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="name[1][a]" id="name[1][a]" value="Sebastian">',
        $this->html->text('name[1][a]')
    );
});

it('returns a model value from a name with an array if its available in the model', function () {
    withModel(['name' => ['first_name' => 'Sebastian']]);
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="name[first_name]" id="name[first_name]" value="Sebastian">',
        $this->html->text('name[first_name]')
    );

    withModel(['relation' => ['name' => ['first_name' => 'Sebastian']]]);
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="relation[name][first_name]" id="relation[name][first_name]" value="Sebastian">',
        $this->html->text('relation[name][first_name]')
    );

    withModel([
        'contact' => ['email' => 'sebastian@spatie.be'],
    ]);
    assertHtmlStringEqualsHtmlString(
        '<input type="email" name="contact[email]" id="contact[email]" value="sebastian@spatie.be">',
        $this->html->email('contact[email]')
    );

    withModel(['relation' => ['contact' => ['email' => 'sebastian@spatie.be']]]);
    assertHtmlStringEqualsHtmlString(
        '<input type="email" name="relation[contact][email]" id="relation[contact][email]" value="sebastian@spatie.be">',
        $this->html->email('relation[contact][email]')
    );

    withModel(['order' => ['number' => 0]]);
    assertHtmlStringEqualsHtmlString(
        '<input type="number" name="order[number]" id="order[number]" value="0">',
        $this->html->input('number', 'order[number]')
    );

    withModel(['relation' => ['order' => ['number' => 0]]]);
    assertHtmlStringEqualsHtmlString(
        '<input type="number" name="relation[order][number]" id="relation[order][number]" value="0">',
        $this->html->input('number', 'relation[order][number]')
    );

    withModel(['name' => ['option_1' => '1']]);
    assertHtmlStringEqualsHtmlString(
        '<div>' .
            '<input type="checkbox" name="name[option_1]" id="name[option_1]" value="1" checked="checked">' .
            '<input type="checkbox" name="name[option_2]" id="name[option_2]" value="1">' .
            '</div>',
        $this->html->div([
            $this->html->checkbox('name[option_1]'),
            $this->html->checkbox('name[option_2]'),
        ])
    );
});

it('returns a session value from a name with an array if its available in the model and the session', function () {
    withModel(['relation' => ['name' => ['first_name' => 'Freek']]]);
    withSession(
        Arr::dot(['relation' => ['name' => ['first_name' => 'Sebastian']]])
    );
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="relation[name][first_name]" id="relation[name][first_name]" value="Sebastian">',
        $this->html->text('relation[name][first_name]')
    );

    withModel(['name' => ['option_1' => '1']]);
    withSession(Arr::dot(['name' => ['option_2' => '1']]));
    assertHtmlStringEqualsHtmlString(
        '<div>' .
            '<input type="checkbox" name="name[option_1]" id="name[option_1]" value="1">' .
            '<input type="checkbox" name="name[option_2]" id="name[option_2]" value="1" checked="checked">' .
            '</div>',
        $this->html->div([
            $this->html->checkbox('name[option_1]'),
            $this->html->checkbox('name[option_2]'),
        ])
    );
});

it("returns a empty value if it's a password field", function () {
    withModel(['password' => 'abc']);
    assertHtmlStringEqualsHtmlString(
        '<input type="password" name="password" id="password">',
        $this->html->password('password')
    );

    withModel(['secret' => 'abc']);
    assertHtmlStringEqualsHtmlString(
        '<input type="password" name="secret" id="secret">',
        $this->html->password('secret')
    );
});
