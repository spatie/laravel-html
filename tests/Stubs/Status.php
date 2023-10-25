<?php

namespace Spatie\Html\Test\Stubs;

enum Status: int
{
    case Unknown = 0;
    case Pending = 1;
    case Complete = 2;

    /**
     * Get the enum as an array formatted for a select.
     *
     * @return array
     */
    public static function asSelectArray()
    {
        return array_column(self::cases(), 'name', 'value');
    }
}
