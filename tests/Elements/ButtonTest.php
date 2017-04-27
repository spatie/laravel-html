<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Test\TestCase;
use Spatie\Html\Elements\Button;

class ButtonTest extends TestCase
{
    /** @test */
    public function it_can_create_a_button()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button></button>',
            Button::create()
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_type()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button type="submit"></button>',
            Button::create()->type('submit')
        );
    }

    /** @test */
    public function it_can_create_a_button_with_a_value()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<button value="1"></button>',
            Button::create()->value(1)
        );
    }
}
