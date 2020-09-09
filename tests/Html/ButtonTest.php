<?php

namespace Spatie\Html\Test\Html;

class ButtonTest extends TestCase
{
    /** @test */
    public function it_can_create_a_button()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button></button>',
            $this->html->button()
        );
    }

    /** @test */
    public function it_can_create_a_button_with_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button>Hi</button>',
            $this->html->button('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_html_contents()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button><em>Hi</em></button>',
            $this->html->button('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button type="submit">Hi</button>',
            $this->html->button('Hi', 'submit')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type_and_name()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button name="buttonname" type="submit">Hi</button>',
            $this->html->button('Hi', 'submit', 'buttonname')
        );
    }
}
