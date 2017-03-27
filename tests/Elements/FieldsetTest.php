<?php

namespace Spatie\Html\Test\Elements;

use Spatie\Html\Test\TestCase;
use Spatie\Html\Elements\Fieldset;

class FieldsetTest extends TestCase
{
    /** @test */
    public function it_can_create_a_fieldset()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<fieldset></fieldset>',
            Fieldset::create()
        );
    }

    /** @test */
    public function it_can_add_a_legend_to_the_fieldset()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<fieldset><legend>Legend</legend></fieldset>',
            Fieldset::create()->legend('Legend')
        );
    }
}
