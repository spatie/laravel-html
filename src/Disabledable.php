<?php

namespace Spatie\Html;

interface Disabledable
{
    /**
     * @return static
     */
    public function disabled();

    /**
     * @param bool $condition
     * @return static
     */
    public function disabledIf($condition);

    /**
     * @return static
     */
    public function undisabled();
}
