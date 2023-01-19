<?php

namespace Spatie\Html\Test\Html;

class ImgTest extends TestCase
{
    /** @test */
    public function it_can_create_a_img_tag_with_image_source_and_alt()
    {
        assertHtmlStringEqualsHtmlString(
            '<img src="/path/to/image/file" alt="alt_value">',
            $this->html->img('/path/to/image/file', 'alt_value')
        );
    }
}
