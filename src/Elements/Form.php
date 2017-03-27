<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class Form extends BaseElement
{
    protected $tag = 'form';

    /**
     * @param string $action
     *
     * @return static
     */
    public function action(?string $action)
    {
        return $this->attribute('action', $action);
    }

    /**
     * @param string $method
     *
     * @return static
     */
    public function method(?string $method)
    {
        return $this->attribute('method', $method);
    }

    /**
     * @return static
     */
    public function acceptsFiles()
    {
        return $this->attribute('enctype', 'multipart/form-data');
    }
}
