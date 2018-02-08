<?php

namespace Spatie\Html\Test\Concerns;

use DOMElement;
use DOMDocument;

trait AssertsHtmlStrings
{
    protected function assertHtmlStringEqualsHtmlString(string $expectedHtml, string $actualHtml)
    {
        $this->assertEqualXMLStructure(
            $this->convertToDomElement($expectedHtml),
            $this->convertToDomElement($actualHtml)
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
