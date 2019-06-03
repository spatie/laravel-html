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
    public function it_can_create_a_date_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="date">',
            $this->html->date()
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
}
