<?php

namespace Spatie\Html\Test\Html;

class SpanTest extends TestCase
{
    /** @test */
    public function it_can_create_a_span()
    {
        assertHtmlStringEqualsHtmlString(
            '<span></span>',
            $this->html->span()
        );
    }

    /** @test */
    public function it_can_create_a_span_with_contents()
    {
        assertHtmlStringEqualsHtmlString(
            '<span>Hi</span>',
            $this->html->span('Hi')
        );
    }

    /** @test */
    public function it_can_create_a_span_with_html_contents()
    {
        assertHtmlStringEqualsHtmlString(
            '<span><em>Hi</em></span>',
            $this->html->span('<em>Hi</em>')
        );
    }

    /** @test */
    public function it_can_create_a_span_with_integer_content()
    {
        assertHtmlStringEqualsHtmlString(
            '<span>50</span>',
            $this->html->span(50)
        );
    }

    /** @test */
    public function it_can_create_a_span_with_float_content()
    {
        assertHtmlStringEqualsHtmlString(
            '<span>50.5</span>',
            $this->html->span(50.5)
        );
    }

    /** @test */
    public function it_can_create_a_span_with_hexadecimal_content()
    {
        assertHtmlStringEqualsHtmlString(
            '<span>1337</span>',
            $this->html->span(0x539)
        );
    }

    /** @test */
    public function it_can_create_a_span_with_octal_content()
    {
        assertHtmlStringEqualsHtmlString(
            '<span>83</span>',
            $this->html->span(0123)
        );
    }
}
