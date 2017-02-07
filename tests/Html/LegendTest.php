<?php

namespace Spatie\Html\Test\Html;

class LegendTest
{
    /** @test */
    public function it_can_create_a_legend()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<legend></legend>',
            $this->html->legend()
        );
    }
}
