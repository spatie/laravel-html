<?php

namespace Spatie\Html\Test\Concerns;

use DOMDocument;

trait AssertsHtmlStrings
{
    protected function assertHtmlStringEqualsHtmlString(string $expectedHtml, string $actualHtml)
    {
        if (method_exists($this, 'assertEqualsCanonicalizing')) {
            $this->assertEqualsCanonicalizing(
                $this->convertToDomDocument($expectedHtml),
                $this->convertToDomDocument($actualHtml),
                '',
                0.0,
                10
            );
        } else {
            // Support PHPUnit
            $this->assertEquals(
                $this->convertToDomDocument($expectedHtml),
                $this->convertToDomDocument($actualHtml),
                '',
                0.0,
                10,
                true
            );
        }
    }

    protected function convertToDomDocument(string $html): DOMDocument
    {
        $html = preg_replace('/>\s+</', '><', $html);

        $domDocument = new DOMDocument();
        $domDocument->loadHTML($html);
        $domDocument->preserveWhiteSpace = false;

        return $domDocument;
    }
}
