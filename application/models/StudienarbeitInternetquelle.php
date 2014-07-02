<?php

class Application_Model_StudienarbeitInternetquelle
{
    protected $_id;
    protected $_idStudienarbeit;
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
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
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
     * @param mixed $idStudienarbeit
     *      * @return $this

     */
    public function setIdStudienarbeit($idStudienarbeit)
    {
        $this->_idStudienarbeit = $idStudienarbeit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdStudienarbeit()
    {
        return $this->_idStudienarbeit;
    }
}