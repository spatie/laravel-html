<?php

it('can render a select element', function () {
    assertHtmlStringEqualsHtmlString(
        '<select></select>',
        $this->html->select()->render()
    );
});

it('can render a select element required', function () {
    assertHtmlStringEqualsHtmlString(
        '<select required></select>',
        $this->html->select()->required()->render()
    );
});

it('can render a select element with options', function () {
    $options = [
        'value1' => 'text1',
        'value2' => 'text2',
    ];

    assertHtmlStringEqualsHtmlString(
        '<select name="select" id="select">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
        $this->html->select('select', $options)->render()
    );
});

it('can render a select element with options with a selected value', function () {
    $options = [
        'value1' => 'text1',
        'value2' => 'text2',
    ];

    assertHtmlStringEqualsHtmlString(
        '<select name="select" id="select">
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
            </select>',
        $this->html->select('select', $options, 'value1')->render()
    );
});

it('can render a select element with options with a selected value when the values are similar', function () {
    $options = [
        '0' => '0',
        '2' => '2',
        '+2' => '+2',
    ];

    assertHtmlStringEqualsHtmlString(
        '<select name="select" id="select">
                <option value="0">0</option>
                <option selected="selected" value="2">2</option>
                <option value="+2" selected="selected">+2</option>
            </select>',
        $this->html->select('select', $options, '+2')->render()
    );
});

it('can render a select element with options with a selected value when using select range method', function () {
    assertHtmlStringEqualsHtmlString(
        '<select name="select_range" id="select_range">
            <option value="1">1</option>
            <option value="2" selected="selected">2</option>
            <option value="3">3</option>
        </select>',
        $this->html->selectRange('select_range', '1', '3', '2')->render()
    );
});
