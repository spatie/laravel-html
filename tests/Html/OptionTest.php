<?php

namespace Spatie\Html\Test\Html;

class OptionTest extends TestCase
{
    /** @test */
    public function it_can_create_an_empty_option()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option value=""></option>',
            $this->html->option()
        );
    }

    /** @test */
    public function it_can_create_an_option_with_text()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option value="">Hi</option>',
            $this->html->option('Hi')
        );
    }

    /** @test */
    public function it_can_create_an_option_with_text_and_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option value="1">Hi</option>',
            $this->html->option('Hi', 1)
        );
    }

    /** @test */
    public function it_can_create_a_selected_option_with_text_and_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option selected value="1">Hi</option>',
            $this->html->option('Hi', 1, true)
        );
    }
}
