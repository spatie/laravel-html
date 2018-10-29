<?php

namespace Spatie\Html\Test\Html;

class MailToTest extends TestCase
{
    /** @test */
    public function it_can_create_a_mailto_link()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a href="mailto:hello@example.com">hello@example.com</a>',
            $this->html->mailto('hello@example.com')
        );
    }

    /** @test */
    public function it_can_create_a_mailto_link_with_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<a href="mailto:hello@example.com">E-mail</a>',
            $this->html->mailto('hello@example.com', 'E-mail')
        );
    }
}
