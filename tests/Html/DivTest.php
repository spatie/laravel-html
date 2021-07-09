<?php

namespace Spatie\Html\Test\Html;

class DivTest extends TestCase
{
    /** @test */
    public function it_can_create_a_div()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div></div>',
            $this->html->div()
        );
    }

    /** @test */
    public function it_can_create_a_div_with_integer_content()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div>500</div>',
            $this->html->div(500)
        );
    }

    /** @test */
    public function it_can_create_a_div_with_float_content()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div>500.5</div>',
            $this->html->div(500.5)
        );
    }

    /** @test */
    public function it_can_create_a_div_with_hexadecimal_content()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div>420</div>',
            $this->html->div(0x1A4)
        );
    }

    /** @test */
    public function it_can_create_a_div_with_octal_content()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<div>420</div>',
            $this->html->div(0644)
        );
    }
}
