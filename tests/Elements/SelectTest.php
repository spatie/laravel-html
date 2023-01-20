<?php

use Spatie\Html\Elements\Select;

it('can render an empty version itself')
    ->assertHtmlStringEqualsHtmlString(
        '<select></select>',
        Select::create()->render()
    );

it('can render options')
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <option value="value1">text1</option>
            </select>',
        Select::create()->options(['value1' => 'text1'])->render()
    );

it('can have a value')
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <option value="value1">text1</option>
                <option selected value="value2">text2</option>
            </select>',
        Select::create()
            ->options(['value1' => 'text1', 'value2' => 'text2'])
            ->value('value2')
            ->render()
    );

it('can have a placeholder option')
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <option value="" selected="selected">Placeholder</option>
                <option value="value1">text1</option>
                <option value="value2">text2</option>
            </select>',
        Select::create()
            ->options(['value1' => 'text1', 'value2' => 'text2'])
            ->placeholder('Placeholder')
            ->render()
    );

it("doesn't select the placeholder if something has already been selected")
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <option value="">Placeholder</option>
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
            </select>',
        Select::create()
            ->options(['value1' => 'text1', 'value2' => 'text2'])
            ->value('value1')
            ->placeholder('Placeholder')
            ->render()
    );

it('can have a multiple option')
    ->assertHtmlStringEqualsHtmlString(
        '<select multiple="multiple">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3">text3</option>
            </select>',
        Select::create()
            ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
            ->multiple()
            ->render()
    );

it('can convert multiple select name')
    ->assertHtmlStringEqualsHtmlString(
        '<select multiple="multiple" name="foo[]">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3">text3</option>
            </select>',
        Select::create()
            ->name('foo')
            ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
            ->multiple()
            ->render()
    );

it('can have multiple values')
    ->assertHtmlStringEqualsHtmlString(
        '<select multiple="multiple">
                <option value="value1" selected="selected">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
        Select::create()
            ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
            ->value(['value1', 'value3'])
            ->multiple()
            ->render()
    );

it('can have one multiple value')
    ->assertHtmlStringEqualsHtmlString(
        '<select multiple="multiple">
                <option value="value1">text1</option>
                <option value="value2">text2</option>
                <option value="value3" selected="selected">text3</option>
            </select>',
        Select::create()
            ->options(['value1' => 'text1', 'value2' => 'text2', 'value3' => 'text3'])
            ->value('value3')
            ->multiple()
            ->render()
    );

it('can have an optgroup')
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <optgroup label="Cats">
                    <option value="leopard">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel">Spaniel</option>
                </optgroup>
            </select>',
        Select::create()
            ->options(['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']])
            ->render()
    );

it('can select an item in an optgroup')
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <optgroup label="Cats">
                    <option value="leopard" selected="selected">Leopard</option>
                </optgroup>
                <optgroup label="Dogs">
                    <option value="spaniel">Spaniel</option>
                </optgroup>
            </select>',
        Select::create()
            ->options(['Cats' => ['leopard' => 'Leopard'], 'Dogs' => ['spaniel' => 'Spaniel']])
            ->value('leopard')
            ->render()
    );

it('can create a disabled select')
    ->assertHtmlStringEqualsHtmlString(
        '<select disabled>
                <option value="value1">text1</option>
            </select>',
        Select::create()->disabled()->options(['value1' => 'text1'])->render()
    );

it('can create a select that is disabled when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<select disabled>
                <option value="value1">text1</option>
            </select>',
        Select::create()->disabled(true)->options(['value1' => 'text1'])->render()
    );

it("won't create a select that is disabled when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <option value="value1">text1</option>
            </select>',
        Select::create()->disabled(false)->options(['value1' => 'text1'])->render()
    );

it('can create a select that has autofocus')
    ->assertHtmlStringEqualsHtmlString(
        '<select autofocus>
                <option value="value1">text1</option>
            </select>',
        Select::create()->autofocus()->options(['value1' => 'text1'])->render()
    );

it('can create a select that has autofocus when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<select autofocus>
                <option value="value1">text1</option>
            </select>',
        Select::create()->autofocus(true)->options(['value1' => 'text1'])->render()
    );

it("won't create a select that has autofocus when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <option value="value1">text1</option>
            </select>',
        Select::create()->autofocus(false)->options(['value1' => 'text1'])->render()
    );

it('can create a select that is required')
    ->assertHtmlStringEqualsHtmlString(
        '<select required>
                <option value="value1">text1</option>
            </select>',
        Select::create()->required()->options(['value1' => 'text1'])->render()
    );

it('can create a select that is required when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<select required>
                <option value="value1">text1</option>
            </select>',
        Select::create()->required(true)->options(['value1' => 'text1'])->render()
    );

it("won't create a select that is required when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <option value="value1">text1</option>
            </select>',
        Select::create()->required(false)->options(['value1' => 'text1'])->render()
    );

it('can create a select that is readonly')
    ->assertHtmlStringEqualsHtmlString(
        '<select readonly>
                <option value="value1">text1</option>
            </select>',
        Select::create()->isReadonly()->options(['value1' => 'text1'])->render()
    );

it('can create a select that is readonly when passing true')
    ->assertHtmlStringEqualsHtmlString(
        '<select readonly>
                <option value="value1">text1</option>
            </select>',
        Select::create()->isReadonly(true)->options(['value1' => 'text1'])->render()
    );

it("won't create a select that is readonly when passing false")
    ->assertHtmlStringEqualsHtmlString(
        '<select>
                <option value="value1">text1</option>
            </select>',
        Select::create()->isReadonly(false)->options(['value1' => 'text1'])->render()
    );
