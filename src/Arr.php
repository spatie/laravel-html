<?php

namespace Spatie\Html;

class Arr
{
    /**
     * Create an array from something. If the something is an iterable, it
     * converts it to an array. If the something is an array it just returns
     * itself. If the something is something else it wraps it in an array.
     *
     * @param $something
     *
     * @return array
     */
    public static function create($something): array
    {
        if ($something instanceof Traversable) {
            return iterator_to_array($something);
        }

        if (! is_array($something)) {
            return [$something];
        }

        return $something;
    }

    /**
     * Return an array of enabled values. Enabled values are either:
     *     - Keys that have a truthy value;
     *     - Values that don't have keys.
     *
     * Example:
     *
     *     Arr::getToggledValues(['foo' => true, 'bar' => false, 'baz'])
     *     // => ['foo', 'baz']
     *
     * @param mixed $map
     *
     * @return array
     */
    public static function getToggledValues(iterable $map): array
    {
        return self::mapAndRemoveEmptyValues(self::create($map), function ($condition, $value) {

            if (is_numeric($value)) {
                return $condition;
            }

            return $condition ? $value : null;
        });
    }

    public static function map(array $array, callable $callback): array
    {
        return array_map($callback, $array, array_keys($array));
    }

    public static function mapAndRemoveEmptyValues(array $array, callable $callback): array
    {
        return array_filter(self::map($array, $callback));
    }
}
