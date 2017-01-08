<?php

namespace Spatie\Html\Test;

use DOMDocument;
use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{
    protected function assertHtmlStringEqualsHtmlString(string $expectedHtml, string $actualHtml)
    {
        $this->assertEquals(
            $this->convertToDomDocument($expectedHtml),
            $this->convertToDomDocument($actualHtml),
            '',
            0.0,
            10,
            true
        );
    }

    protected function convertToDomDocument(string $html): DOMDocument
    {
        $domDocument = new DOMDocument();
        $domDocument->loadHTML($html);
        $domDocument->preserveWhiteSpace = false;

        return $domDocument;
    }
}
