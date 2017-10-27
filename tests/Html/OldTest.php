<?php

namespace Spatie\Html\Test\Html;

class OldTest extends TestCase
{
    /** @test */
    public function it_returns_a_session_value_if_its_available_in_the_session()
    {
        $this
            ->withSession(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" id="name" value="Sebastian">',
                $this->html->text('name')
            );
    }

    /** @test */
    public function it_returns_a_model_value_if_its_available_in_the_model()
    {
        $this
            ->withModel(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" id="name" value="Sebastian">',
                $this->html->text('name')
            );

        $this
            ->withModel(['email' => 'sebastian@spatie.be'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="email" name="email" id="email" value="sebastian@spatie.be">',
                $this->html->email('email')
            );
    }

    /** @test */
    public function it_returns_a_session_value_if_its_available_in_the_model_and_the_session()
    {
        $this
            ->withModel(['name' => 'Freek'])
            ->withSession(['name' => 'Sebastian'])
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name" id="name" value="Sebastian">',
                $this->html->text('name')
            );
    }

    /** @test */
    public function it_returns_a_session_value_from_a_name_with_an_array()
    {
        $this
            ->withSession(array_dot(['name' => [1 => ['a' => 'Sebastian']]]))
            ->assertHtmlStringEqualsHtmlString(
                '<input type="text" name="name[1][a]" id="name[1][a]" value="Sebastian">',
                $this->html->text('name[1][a]')
            );
    }
}
