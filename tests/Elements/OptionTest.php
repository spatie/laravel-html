<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Option;
use Spatie\Html\Test\TestCase;

class OptionTest extends TestCase
{
    /** @test */
    public function it_can_render_an_empty_version_itself()
    {
        assertHtmlStringEqualsHtmlString(
            '<option></option>',
            Option::create()->render()
        );
    }

    /** @test */
    public function it_can_render_itself_with_a_text_and_a_value()
    {
        assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->render()
        );
    }

    /** @test */
    public function it_can_render_itself_in_a_selected_state()
    {
        assertHtmlStringEqualsHtmlString(
            '<option selected value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->selected('0')
        );
    }

    /** @test */
    public function it_can_unselect_itself()
    {
        assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->selected('0')->unselected()
        );
    }

    /** @test */
    public function it_can_conditionally_select_itself()
    {
        assertHtmlStringEqualsHtmlString(
            '<option selected value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->selectedIf(true)
        );

        assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->selectedIf(false)
        );
    }

    /** @test */
    public function it_can_disable_an_optgroup()
    {
        assertHtmlStringEqualsHtmlString(
            '<option disabled></option>',
            Option::create()->disabled()
        );
    }
}
