<?php

namespace Spatie\Html\Test\Html;

class InputTest extends TestCase
{
    /** @test */
    public function it_can_create_an_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input>',
            $this->html->input()
        );
    }

    /** @test */
    public function it_can_create_an_input_with_a_custom_type()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="text">',
            $this->html->input('text')
        );
    }

    /** @test */
    public function it_can_create_an_input_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="foo" type="text" name="foo">',
            $this->html->input('text', 'foo')
        );
    }

    /** @test */
    public function it_can_create_an_input_with_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="foo" type="text" name="foo" value="bar">',
            $this->html->input('text', 'foo', 'bar')
        );
    }

    /** @test */
    public function it_can_create_an_input_with_a_placeholder()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input placeholder="Foo bar">',
            $this->html->input()->placeholder('Foo bar')
        );
    }

    /** @test */
    public function it_can_create_an_input_that_is_required()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input required>',
            $this->html->input()->required()
        );
    }

    /** @test */
    public function it_can_create_an_input_that_has_autofocus()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input autofocus>',
            $this->html->input()->autofocus()
        );
    }

    /** @test */
    public function it_can_check_an_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" checked="checked">',
            $this->html->input('checkbox')->checked(true)
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox" checked="checked">',
            $this->html->input('checkbox')->checked(true)
        );
    }

    /** @test */
    public function it_can_uncheck_an_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            $this->html->input('checkbox')->checked()->checked(false)
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<input type="checkbox">',
            $this->html->input('checkbox')->checked()->unchecked()
        );
    }

    /** @test */
    public function it_can_create_an_input_that_is_readonly()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input readonly>',
            $this->html->input()->readonly()
        );
    }

    /** @test */
    public function it_can_create_an_input_without_readonly()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input>',
            $this->html->input()->readonly(false)
        );
    }

    /** @test */
    public function it_can_remove_readonly_from_a_readonly_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input>',
            $this->html->input()->readonly()->readonly(false)
        );
    }

    /** @test */
    public function it_can_create_a_date_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="date">',
            $this->html->date()
        );
    }

    /** @test */
    public function it_can_create_a_date_input_with_blank_date()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_date" name="test_date" type="date" value=""/>',
            $this->html->date('test_date', '')
        );
    }

    /** @test */
    public function it_can_create_a_date_input_and_format_date()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_date" name="test_date" type="date" value="2017-09-04"/>',
            $this->html->date('test_date', '2017-09-04T23:33:32')
        );
    }

    /** @test */
    public function it_can_create_a_date_input_and_format_model_date()
    {
        $this->html->model(['test_date' => '2017-09-04T23:33:32']);

        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_date" name="test_date" type="date" value="2017-09-04"/>',
            $this->html->date('test_date')
        );
    }

    /** @test */
    public function it_can_create_a_date_input_with_invalid_date()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_date" name="test_date" type="date" value="notadate"/>',
            $this->html->date('test_date', 'notadate')
        );
    }

    /** @test */
    public function it_can_create_a_datetime_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="datetime-local">',
            $this->html->datetime()
        );
    }

    /** @test */
    public function it_can_create_a_datetime_input_with_blank_date()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_datetime" name="test_datetime" type="datetime-local" value=""/>',
            $this->html->datetime('test_datetime', '')
        );
    }

    /** @test */
    public function it_can_create_a_datetime_input_and_format_date()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_datetime" name="test_datetime" type="datetime-local" value="2020-01-20T15:00:12"/>',
            $this->html->datetime('test_datetime', '2020-01-20T15:00:12')
        );
    }

    /** @test */
    public function it_can_create_a_datetime_input_and_format_model_date()
    {
        $this->html->model(['test_datetime' => '2020-01-20T15:00:12']);

        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_datetime" name="test_datetime" type="datetime-local" value="2020-01-20T15:00:12"/>',
            $this->html->datetime('test_datetime')
        );
    }

    /** @test */
    public function it_can_create_a_datetime_input_with_invalid_date()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_datetime" name="test_datetime" type="datetime-local" value="notadate"/>',
            $this->html->datetime('test_datetime', 'notadate')
        );
    }

    /** @test */
    public function it_can_create_a_time_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="time">',
            $this->html->time()
        );
    }

    /** @test */
    public function it_can_create_a_time_input_with_blank_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_time" name="test_time" type="time" value=""/>',
            $this->html->time('test_time', '')
        );
    }

    /** @test */
    public function it_can_create_a_time_input_with_time_string_and_format()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_time" name="test_time" type="time" value="11:30:00"/>',
            $this->html->time('test_time', '11:30')
        );
    }

    /** @test */
    public function it_can_create_a_time_input_with_string_and_format()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_time" name="test_time" type="time" value="23:33:32"/>',
            $this->html->time('test_time', '2017-09-04T23:33:32')
        );
    }

    /** @test */
    public function it_can_create_a_time_input_with_invalid_time()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="test_time" name="test_time" type="time" value="timeoclock"/>',
            $this->html->time('test_time', 'timeoclock')
        );
    }

    /** @test */
    public function it_can_create_a_time_input_with_model_time()
    {
        $this->html->model(['time' => '2017-09-04T23:33:32']);

        $this->assertHtmlStringEqualsHtmlString(
            '<input id="time" name="time" type="time" value="23:33:32"/>',
            $this->html->time('time')
        );
    }

    /** @test */
    public function it_can_create_a_range_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="range">',
            $this->html->range()
        );
    }

    /** @test */
    public function it_can_create_a_range_input_with_min_max()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="range" name="test" id="test" value="0" min="0" max="100">',
            $this->html->range('test', '0', '0', '100')
        );
    }

    /** @test */
    public function it_can_create_a_range_input_with_min_max_step()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="range" name="test" id="test" value="0" min="0" max="100" step="10">',
            $this->html->range('test', '0', '0', '100', '10')
        );
    }

    /** @test */
    public function it_can_create_a_range_input_with_max_step()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="range" name="test" id="test" value="30" max="100" step="10">',
            $this->html->range('test', '30', null, '100', '10')
        );
    }

    /** @test */
    public function it_can_create_a_number_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="number">',
            $this->html->number()
        );
    }

    /** @test */
    public function it_can_create_a_number_input_with_min_max()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="number" name="test" id="test" value="0" min="0" max="100">',
            $this->html->number('test', '0', '0', '100')
        );
    }

    /** @test */
    public function it_can_create_a_number_input_with_min_max_step()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="number" name="test" id="test" value="0" min="0" max="100" step="10">',
            $this->html->number('test', '0', '0', '100', '10')
        );
    }

    /** @test */
    public function it_can_create_a_number_input_with_max_step()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="number" name="test" id="test" value="30" max="100" step="10">',
            $this->html->number('test', '30', null, '100', '10')
        );
    }
}
