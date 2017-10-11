<?php

namespace Spatie\Html\Elements;

use Spatie\Html\BaseElement;

class File extends BaseElement
{
    protected $tag = 'input';

    const ACCEPT_AUDIO = 'audio/*';
    const ACCEPT_VIDEO = 'video/*';
    const ACCEPT_IMAGE = 'image/*';

    public function __construct()
    {
        parent::__construct();

        $this->attributes->setAttribute('type', 'file');
    }

    /**
     * @param string|null $name
     *
     * @return static
     */
    public function name($name)
    {
        return $this->attribute('name', $name);
    }

    /**
     * @return static
     */
    public function required()
    {
        return $this->attribute('required');
    }

    /**
     * @return static
     */
    public function autofocus()
    {
        return $this->attribute('autofocus');
    }

    /**
     * @param string|null $name
     *
     * @return static
     */
    public function accept($type)
    {
        return $this->attribute('accept', $type);
    }

    /**
     * @return static
     */
    public function acceptAudio()
    {
        return $this->attribute('accept', self::ACCEPT_AUDIO);
    }

    /**
     * @return static
     */
    public function acceptVideo()
    {
        return $this->attribute('accept', self::ACCEPT_VIDEO);
    }

    /**
     * @return static
     */
    public function acceptImage()
    {
        return $this->attribute('accept', self::ACCEPT_IMAGE);
    }

    /**
     * @return static
     */
    public function multiple()
    {
        return $this->attribute('multiple');
    }
}
