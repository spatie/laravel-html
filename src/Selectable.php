<?php

namespace Spatie\Html;

interface Selectable
{
    /**
     * @return static
     */
    public function selected();

    /**
     * @return static
     */
    public function selectedIf(bool $condition);

    /**
     * @return static
     */
    public function unselected();
}
