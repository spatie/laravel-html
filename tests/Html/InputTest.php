<?php

it('can create an input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input>',
        $this->html->input()
    );
});

it('can create an input with a custom type', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="text">',
        $this->html->input('text')
    );
});

it('can create an input with a name', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="foo" type="text" name="foo">',
        $this->html->input('text', 'foo')
    );
});

it('can create an input with a value', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="foo" type="text" name="foo" value="bar">',
        $this->html->input('text', 'foo', 'bar')
    );
});

it('can create an input with a placeholder', function () {
    assertHtmlStringEqualsHtmlString(
        '<input placeholder="Foo bar">',
        $this->html->input()->placeholder('Foo bar')
    );
});

it('can create an input that is required', function () {
    assertHtmlStringEqualsHtmlString(
        '<input required>',
        $this->html->input()->required()
    );
});

it('can create an input that has autofocus', function () {
    assertHtmlStringEqualsHtmlString(
        '<input autofocus>',
        $this->html->input()->autofocus()
    );
});

it('can check an input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" checked="checked">',
        $this->html->input('checkbox')->checked(true)
    );

    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox" checked="checked">',
        $this->html->input('checkbox')->checked(true)
    );
});

it('can uncheck an input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox">',
        $this->html->input('checkbox')->checked()->checked(false)
    );

    assertHtmlStringEqualsHtmlString(
        '<input type="checkbox">',
        $this->html->input('checkbox')->checked()->unchecked()
    );
});

it('can create an input that is readonly', function () {
    assertHtmlStringEqualsHtmlString(
        '<input readonly>',
        $this->html->input()->isReadonly()
    );
});

it('can create an input without readonly', function () {
    assertHtmlStringEqualsHtmlString(
        '<input>',
        $this->html->input()->isReadonly(false)
    );
});

it('can remove readonly from a readonly input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input>',
        $this->html->input()->isReadonly()->isReadonly(false)
    );
});

it('can create a date input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="date">',
        $this->html->date()
    );
});

it('can create a date input with blank date', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_date" name="test_date" type="date" value=""/>',
        $this->html->date('test_date', '')
    );
});

it('can create a date input and format date', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_date" name="test_date" type="date" value="2017-09-04"/>',
        $this->html->date('test_date', '2017-09-04T23:33:32')
    );
});

it('can create a date input and format model date', function () {
    $this->html->model(['test_date' => '2017-09-04T23:33:32']);

    assertHtmlStringEqualsHtmlString(
        '<input id="test_date" name="test_date" type="date" value="2017-09-04"/>',
        $this->html->date('test_date')
    );
});

it('can create a date input with invalid date', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_date" name="test_date" type="date" value="notadate"/>',
        $this->html->date('test_date', 'notadate')
    );
});

it('can create a datetime input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="datetime-local">',
        $this->html->datetime()
    );
});

it('can create a datetime input with blank date', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_datetime" name="test_datetime" type="datetime-local" value=""/>',
        $this->html->datetime('test_datetime', '')
    );
});

it('can create a datetime input and format date', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_datetime" name="test_datetime" type="datetime-local" value="2020-01-20T15:00:12"/>',
        $this->html->datetime('test_datetime', '2020-01-20T15:00:12')
    );
});

it('can create a datetime input and format model date', function () {
    $this->html->model(['test_datetime' => '2020-01-20T15:00:12']);

    assertHtmlStringEqualsHtmlString(
        '<input id="test_datetime" name="test_datetime" type="datetime-local" value="2020-01-20T15:00:12"/>',
        $this->html->datetime('test_datetime')
    );
});

it('can create a datetime input with invalid date', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_datetime" name="test_datetime" type="datetime-local" value="notadate"/>',
        $this->html->datetime('test_datetime', 'notadate')
    );
});

it('can create a time input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="time">',
        $this->html->time()
    );
});

it('can create a time input with blank value', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_time" name="test_time" type="time" value=""/>',
        $this->html->time('test_time', '')
    );
});

it('can create a time input with time string and format', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_time" name="test_time" type="time" value="11:30:00"/>',
        $this->html->time('test_time', '11:30')
    );
});

it('can create a time input with string and format', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_time" name="test_time" type="time" value="23:33:32"/>',
        $this->html->time('test_time', '2017-09-04T23:33:32')
    );
});

it('can create a time input with invalid time', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_time" name="test_time" type="time" value="timeoclock"/>',
        $this->html->time('test_time', 'timeoclock')
    );
});

it('can create a time input with model time', function () {
    $this->html->model(['time' => '2017-09-04T23:33:32']);

    assertHtmlStringEqualsHtmlString(
        '<input id="time" name="time" type="time" value="23:33:32"/>',
        $this->html->time('time')
    );
});

it('can create a range input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="range">',
        $this->html->range()
    );
});

it('can create a range input with min max', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="range" name="test" id="test" value="0" min="0" max="100">',
        $this->html->range('test', '0', '0', '100')
    );
});

it('can create a range input with min max step', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="range" name="test" id="test" value="0" min="0" max="100" step="10">',
        $this->html->range('test', '0', '0', '100', '10')
    );
});

it('can create a range input with max step', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="range" name="test" id="test" value="30" max="100" step="10">',
        $this->html->range('test', '30', null, '100', '10')
    );
});

it('can create a number input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="number">',
        $this->html->number()
    );
});

it('can create a number input with min max', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="number" name="test" id="test" value="0" min="0" max="100">',
        $this->html->number('test', '0', '0', '100')
    );
});

it('can create a number input with min max step', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="number" name="test" id="test" value="0" min="0" max="100" step="10">',
        $this->html->number('test', '0', '0', '100', '10')
    );
});

it('can create a number input with max step', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="number" name="test" id="test" value="30" max="100" step="10">',
        $this->html->number('test', '30', null, '100', '10')
    );
});

it('can create a search input', function () {
    assertHtmlStringEqualsHtmlString(
        '<input type="search">',
        $this->html->search()
    );
});

it('can create a search input with blank date', function () {
    assertHtmlStringEqualsHtmlString(
        '<input id="test_search" name="test_search" type="search" value=""/>',
        $this->html->search('test_search', '')
    );
});
