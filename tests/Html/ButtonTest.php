<?php

namespace Spatie\Html\Test\Html;

class ButtonTest extends TestCase
{
    /** @test */
    public function it_can_create_a_button()
    {
        assertHtmlStringEqualsHtmlString(
            '<button></button>',
            $this->html->button()
        );
    }

    /** @test */
    public function it_can_create_a_button_with_contents()
    {
        assertHtmlStringEqualsHtmlString(
            '<button>Hi</button>',
            $this->html->button('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_html_contents()
    {
        assertHtmlStringEqualsHtmlString(
            '<button><em>Hi</em></button>',
            $this->html->button('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type()
    {
        assertHtmlStringEqualsHtmlString(
            '<button type="submit">Hi</button>',
            $this->html->button('Hi', 'submit')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type_and_name()
    {
        assertHtmlStringEqualsHtmlString(
            '<button name="buttonname" type="submit">Hi</button>',
            $this->html->button('Hi', 'submit', 'buttonname')
        );
    }
}
