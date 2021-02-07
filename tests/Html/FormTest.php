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

    /** @test */
    public function it_can_create_a_form_with_a_custom_action()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit">'.
                '<input type="hidden" name="_token" value="abc">
            </form>',
            $this->html->form('POST', '/submit')
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_target()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="POST" action="/submit" target="_blank">'.
            '<input type="hidden" name="_token" value="abc">
            </form>',
            $this->html->form('POST', '/submit')->target('_blank')
        );
    }

    /** @test */
    public function it_can_create_a_form_with_a_custom_method_that_gets_spoofed()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form action="/submit" method="POST">'.
                '<input type="hidden" name="_method" id="_method" value="DELETE">'.
                '<input type="hidden" name="_token" value="abc">'.
            '</form>',
            $this->html->form('DELETE', '/submit')
        );
    }

    /** @test */
    public function it_can_get_value_from_a_form()
    {
        $this->html->form('DELETE', '/submit');
        $this->assertHtmlStringEqualsHtmlString(
            '<p>delete</p>',
            $this->html->value('_method', 'delete')
        );
        $this->assertHtmlStringEqualsHtmlString(
            '<p>abc</p>',
            $this->html->value('_token', 'abc')
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

    /** @test */
    public function it_can_create_form_with_end_model()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form action="submit" method="GET"></form>',
            $this->html->endModel()->form('GET', 'submit')
        );
    }

    /** @test */
    public function it_can_return_close_model_form()
    {
        $this->assertSame(
            '</form>',
            (string) $this->html->closeModelForm()
        );
    }
}
