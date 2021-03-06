<?php

namespace nanophp\Template;

/**
 * Abstract: Template
 *
 * Abstract class for templates
 */

abstract class Template
{
    /**
     * _dir
     *
     * @var mixed
     */
    protected $_dir = null;
    /**
     * _data
     *
     * @var array
     */
    protected $_data = array();
    /**
     * _headers
     *
     * @var array
     */
    protected $_headers = array();

    /**
     * __construct
     *
     * Initialize PHP template
     */
    public function __construct()
    {
        // Define views directory to look for defined views
        $this->_dir = APPDIR.'views/';
    }

    /**
     * render
     *
     * Render method in templates does the job and displays the content
     * @param string $__view The name of view file to find
     * @param array $data
     */
    abstract public function render($__view, $data = array());

    /**
     * renderPartial
     *
     * Make it possible to partialy render a view and do not send it to output
     *
     * @param string $__view
     * @param array $__data
     *
     * @return mixed $content Return view's content
     */
    abstract public function renderPartial($__view, $__data = array());

    /**
     * addHeader
     *
     * Add a html header
     *
     * @param string $header A header string
     *
     * @return object $this
     */
    public function addHeader($header)
    {
        if (!in_array($header, $this->_headers)) {
            $this->_headers[] = $header;
        }

        return $this;
    }

    /**
     * getHeaders
     *
     * Receive html headers
     *
     * @return array headers
     */
    public function getHeaders()
    {
        return $this->_headers;
    }

    /**
     * __set
     *
     * Magic setter funcion
     *
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        $this->_data[$key] = $value;
    }

    /**
     * __get
     *
     * Magic getter funcion
     *
     * @param string $key
     *
     * @return mixed $value
     */
    public function __get($key)
    {
        return isset($this->_data[$key]) ? $this->_data[$key] : null;
    }


    /**
     * __isset
     *
     * Magix isset function
     *
     * @param string $key
     *
     * @return bool isset
     */
    public function __isset($key)
    {
        return isset($this->_data[$key]);
    }
}
