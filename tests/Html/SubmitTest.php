<?php

namespace Spatie\Html\Test\Html;

class SubmitTest extends TestCase
{
    /** @test */
    public function it_can_create_a_submit_button()
    {
        assertHtmlStringEqualsHtmlString(
            '<button type="submit"></button>',
            $this->html->submit()
        );
    }

    /** @test */
    public function it_can_create_a_submit_button_with_contents()
    {
        assertHtmlStringEqualsHtmlString(
            '<button type="submit">Send</button>',
            $this->html->submit('Send')
        );
    }
}
