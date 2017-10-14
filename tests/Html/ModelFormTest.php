<?php

namespace Spatie\Html\Test\Html;

class ModelFormTest extends TestCase
{
    /** @test */
    public function it_can_create_a_form_from_a_model()
    {
        $this->assertHtmlStringEqualsHtmlString(
            '<form method="post">'.
                '<input id="_token" name="_token" type="hidden" value="abc">'.
            '</form>',
            $this->html->modelForm([])
        );
    }
}
