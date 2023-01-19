<?php

namespace Spatie\Html\Test\Html;

class FieldsetTest extends TestCase
{
    /** @test */
    public function it_can_create_a_fieldset()
    {
        assertHtmlStringEqualsHtmlString(
            '<fieldset></fieldset>',
            $this->html->fieldset()
        );
    }

    /** @test */
    public function it_can_create_a_fieldset_with_a_legend()
    {
        assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            $this->html->fieldset('Legend')
        );
    }

    /** @test */
    public function it_can_add_a_legend_to_the_fieldset()
    {
        assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            $this->html->fieldset()->legend('Legend')
        );
    }
}
