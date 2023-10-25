<?php

use Spatie\Html\Test\Stubs\Role;
use Spatie\Html\Test\Stubs\Status;

it('can create a form from a model', function () {
    assertHtmlStringEqualsHtmlString(
        '<form method="POST">' .
            '<input name="_token" type="hidden" value="abc">' .
            '</form>',
        $this->html->modelForm([])
    );
});

it('returns an enum value from a name with an enum cast in the model', function () {
    withModel(['relation' => ['role' => Role::Admin]]);
    assertHtmlStringEqualsHtmlString(
        '<input type="text" name="relation[role]" id="relation[role]" value="Admin">',
        $this->html->text('relation[role]')
    );

    withModel(['select' => Status::Pending]);
    assertHtmlStringEqualsHtmlString(
        '<select name="select" id="select">
            <option value="0">Unknown</option>
            <option value="1" selected="selected">Pending</option>
            <option value="2">Complete</option>
        </select>',
        $this->html->select('select', Status::asSelectArray())->render()
    );
});
