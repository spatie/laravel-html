<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Form extends BaseElement
{
    protected $tag = 'form';

    /**
     * @param string|null $action
     *
     * @return static
     */
    public function action($action)
    {
        return $this->attribute('action', $action);
    }

    /**
     * @param string|null $method
     *
     * @return static
     */
    public function method($method)
    {
        return $this->attribute('method', $method);
    }

    /**
     * @return static
     */
    public function novalidate()
    {
        return $this->attribute('novalidate');
    }

    /**
     * @return static
     */
    public function acceptsFiles()
    {
        return $this->attribute('enctype', 'multipart/form-data');
    }
}
