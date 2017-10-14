<?php

namespace Spatie\Html\Test\Html;

class SubmitTest extends TestCase
{
    /** @test */
    public function it_can_create_a_submit_button()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button type="submit"></button>',
            $this->html->submit()
        );
    }

    /** @test */
    public function it_can_create_a_submit_button_with_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button type="submit">Send</button>',
            $this->html->submit('Send')
        );
    }
}
