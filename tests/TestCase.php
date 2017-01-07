<?php

namespace Spatie\Html\Test;

use DOMDocument;
use DOMElement;
use PHPUnit_Framework_TestCase;

class TestCase extends PHPUnit_Framework_TestCase
{
    protected function assertSameHtml(string $expectedHtml, string $actualHtml)
    {
        $this->assertEqualXMLStructure(
            $this->convertToDomElement($expectedHtml),
            $this->convertToDomElement($actualHtml),
            true
        );
    }

    protected function convertToDomElement(string $html): DOMElement
    {
        $domDocument = new DOMDocument();
        $domDocument->loadHTML($html);
        $domDocument->preserveWhiteSpace = false;

        return $domDocument->documentElement;
    }
}
