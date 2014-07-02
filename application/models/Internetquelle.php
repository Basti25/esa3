<?php

class Application_Model_Internetquelle
{
    protected $_url;
    protected $_titel;
    protected $_idInternetquelle;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid blog property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid blog property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * @param mixed $idInternetquelle
     * @return $this
     */
    public function setIdInternetquelle($idInternetquelle)
    {
        $this->_idInternetquelle = $idInternetquelle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdInternetquelle()
    {
        return $this->_idInternetquelle;
    }

    /**
     * @param mixed $titel
     * @return $this
     */
    public function setTitel($titel)
    {
        $this->_titel = $titel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitel()
    {
        return $this->_titel;
    }

    /**
     * @param mixed $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->_url = $url;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->_url;
    }
}