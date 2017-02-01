<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Option;

class OptionTest extends TestCase
{
    /** @test */
    public function it_can_render_an_empty_version_itself()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option></option>',
            Option::create()->render()
        );
    }

    /** @test */
    public function it_can_render_itself_with_a_text_and_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->render()
        );
    }

    /** @test */
    public function it_can_render_itself_in_a_selected_state()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option selected value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->selected('0')
        );
    }

    /** @test */
    public function it_can_unselect_itself()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->selected('0')->unselected()
        );
    }

    /** @test */
    public function it_can_conditionally_select_itself()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<option selected value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->selectedIf(true)
        );

        $this->assertHtmlStringEqualsHtmlString(
            '<option value="0">Choose...</option>',
            Option::create()->value('0')->text('Choose...')->selectedIf(false)
        );
    }
}
