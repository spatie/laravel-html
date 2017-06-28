<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;
use Illuminate\Support\Traits\Macroable;

class Form extends BaseElement
{
    use Macroable;

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
    public function acceptsFiles()
    {
        return $this->attribute('enctype', 'multipart/form-data');
    }

    /**
     * @param string $route
     * @param array $parameters
     *
     * @return static
     */
    public function route($route, $parameters = [])
    {
        return $this->action(app('url')->route($route, $parameters));
    }
}
