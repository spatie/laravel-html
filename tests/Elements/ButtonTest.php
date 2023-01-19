<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Button;
use Spatie\Html\Test\TestCase;

class ButtonTest extends TestCase
{
    /** @test */
    public function it_can_create_a_button()
    {
        assertHtmlStringEqualsHtmlString(
            '<button></button>',
            Button::create()
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type()
    {
        assertHtmlStringEqualsHtmlString(
            '<button type="submit"></button>',
            Button::create()->type('submit')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_value()
    {
        assertHtmlStringEqualsHtmlString(
            '<button value="1"></button>',
            Button::create()->value(1)
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_name()
    {
        assertHtmlStringEqualsHtmlString(
            '<button name="foo"></button>',
            Button::create()->name('foo')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_name_and_value()
    {
        assertHtmlStringEqualsHtmlString(
            '<button name="foo" value="bar"></button>',
            Button::create()->name('foo')->value('bar')
        );
    }

    /** @test */
    public function it_can_disable_a_button()
    {
        assertHtmlStringEqualsHtmlString(
            '<button disabled></button>',
            Button::create()->disabled()
        );
    }
}
