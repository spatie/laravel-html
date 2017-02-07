<?php

namespace Spatie\Html\Test\Html;

class FormTest extends TestCase
{
    /** @test */
    public function it_can_create_a_form()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="POST"><input type="hidden" name="_token" value="abc"></form>',
            $this->html->form()
        );
    }

    public function it_can_create_a_form_with_a_custom_action()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit"></form>',
            $this->html->form('POST', '/submit')
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_custom_method_that_gets_spoofed()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form action="/submit" method="POST">'.
                '<input type="hidden" name="_method" value="DELETE">'.
                '<input type="hidden" name="_token" value="abc">'.
            '</form>',
            $this->html->form('DELETE', '/submit')
        );
    }

    /** @test */
    public function it_doesnt_render_a_token_field_when_using_a_get_method()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form action="/submit" method="GET"></form>',
            $this->html->form('GET', '/submit')
        );
    }
}
