# Changelog

All notable changes to `laravel-html` will be documented in this file.

## 2.8.2 - 2017-10-13
- Fixed a bug with values that are a `"0"` string

## 2.8.1 - 2017-10-12
- Fixed a bug with values that are a `"0"` string

## 2.8.0 - 2017-10-12
- Added a magic `__call` method that responds to methods ending with `If`, so any method can be called with a condition as it's first argument. The method will only be applied if the condition is truthy.

## 2.7.0 - 2017-10-11
- Added `BaseElement::data` for data attributes

## 2.6.0 - 2017-10-11
- Added `BaseElement::setChildren` to replace all children
- Fixed a bug that didn't select options in optgroups when applying a value

## 2.5.0 - 2017-10-11
- Added `BaseElement::style` for setting the style attribute (with a string or an associative array)
- Added `Html::reset` for form reset buttons

## 2.4.1 - 2017-09-07
- Nothing changed, but `2.2.0` was accidentally tagged as `2.4.0`. This release contains the actual latest version at the time of writing.

## 2.3.0 - 2017-09-04
- Added `checked` and `unchecked` methods to `Input`

## 2.2.0 - 2017-08-29
- Added `Optgroup` element
- Added the ability to create optgroups in `Options` by passing an array of groups with options

## 2.1.0 - 2017-08-24
- Added `Html::file` and a `File` element for file inputs

## 2.0.2 - 2017-07-14
- Fixed an issue that stripped square brackets from element attributes

## 2.0.1 - 2017-06-28
- Fixed the `Html` facade

## 2.0.0 - 2017-06-13
- Minimum requirements have been reduced to PHP 7.0
- Added a `html()` helper function that returns an instance of `Html`
- Added `Macroable` to all elements and `Html`
- Loosened type hints in method signatures for flexibility
- Added `Html::multiselect` method
- Added `Select::multiple` method

## 1.5.0 - 2017-05-19
- Added `class` method to `Html`

## 1.4.0 - 2017-05-16
- Added a `placeholder` method to `Textarea`

## 1.3.1 - 2017-05-09
- Added an empty `value` to `Select::placeholder`

## 1.3.0 - 2017-05-08
- Added a `placeholder` method to `Select` for default empty values

## 1.2.0 - 2017-04-28
- Added a `Html` facade

## 1.1.1 - 2017-04-27
- Fixed an issue where html was escaped when you didn't want it to do that, like in buttons and links

## 1.1.0 - 2017-04-19
- Added `Html::radio`
- Fixed an issue that set the wrong `value` for a checkbox created with `Html::checkbox`
- Fixed a case sensitivity issue with the `Textarea` class

## 1.0.0 - 2017-03-31
- Initial release
