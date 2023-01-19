<?php

it('can create an element')
    ->expect(fn () => $this->html->element('foo'))
    ->toEqual('<foo></foo>');
