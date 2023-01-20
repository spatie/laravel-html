<?php

use Spatie\Html\Elements\Element;
use Spatie\Html\Exceptions\MissingTag;

it('can create an element with a tag')
    ->expect(fn () => Element::withTag('foo'))
    ->toEqual('<foo></foo>');

it("can't create an element without a tag")
    ->tap(fn () =>  Element::create())
    ->throws(MissingTag::class);
