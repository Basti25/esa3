<?php

class Application_Model_Studienarbeit
{
    protected $_idStudienarbeit;
    protected $_titel;
    protected $_gruppenmitglieder;
    protected $_idModul;

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
     * @param mixed $gruppenmitglieder
     * @return $this
     */
    public function setGruppenmitglieder($gruppenmitglieder)
    {
        $this->_gruppenmitglieder = $gruppenmitglieder;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGruppenmitglieder()
    {
        return $this->_gruppenmitglieder;
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

    /**
     * @param mixed $idStudienarbeit
     * @return $this
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

    /**
     * @param mixed $title
     * @return $this
     */
    public function setTitel($title)
    {
        $this->_titel = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitel()
    {
        return $this->_titel;
    }
}

