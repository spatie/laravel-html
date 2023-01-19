<?php

namespace Spatie\Html\Test;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @param string $expectedHtml
     * @param \Illuminate\Contracts\Support\Htmlable|string $actualHtml
     */
    public function assertHtmlStringEqualsHtmlString(string $expectedHtml, string $actualHtml): self
    {
        $this->assertEqualsCanonicalizing(
            convertToDomDocument($expectedHtml),
            convertToDomDocument($actualHtml),
            '',
            0.0,
            10
        );

        return $this;
    }
}
