<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Elements\Fieldset;
use Spatie\Html\Test\TestCase;

class FieldsetTest extends TestCase
{
    /** @test */
    public function it_can_create_a_fieldset()
    {
        assertHtmlStringEqualsHtmlString(
            '<fieldset></fieldset>',
            Fieldset::create()
        );
    }

    /** @test */
    public function it_can_add_a_legend_to_the_fieldset()
    {
        assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            Fieldset::create()->legend('Legend')
        );
    }

    /** @test */
    public function it_can_disable_a_fieldset()
    {
        assertHtmlStringEqualsHtmlString(
            '<fieldset disabled></fieldset>',
            Fieldset::create()->disabled()
        );
    }
}
