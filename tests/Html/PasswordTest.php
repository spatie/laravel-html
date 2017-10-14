<?php

namespace Spatie\Html\Test\Html;

class PasswordTest extends TestCase
{
    /** @test */
    public function it_can_create_a_password_input()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input type="password">',
            $this->html->password()
        );
    }

    /** @test */
    public function it_can_create_a_password_input_with_a_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<input id="confirm_password" type="password" name="confirm_password">',
            $this->html->password('confirm_password')
        );
    }
}
