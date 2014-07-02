<?php

class Application_Model_ModulLiteratur
{
    protected $_id;
    protected $_idModul;
    protected $_idLiteratur;

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
     * @param mixed $idLiteratur
     * @return $this
     */
    public function setIdLiteratur($idLiteratur)
    {
        $this->_idLiteratur = $idLiteratur;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getIdLiteratur()
    {
        return $this->_idLiteratur;
    }

    /**
     * @param mixed $idModul
     * @return $this
     */
    public function setIdModul($idModul)
    {
        $this->_idModul = $idModul;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdModul()
    {
        return $this->_idModul;
    }
}