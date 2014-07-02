<?php

class Application_Model_Literatur
{
    protected $_idLiteratur;
    protected $_buchtitel;
    protected $_verfasser;
    protected $_beitragstitel;
    protected $_herausgeber;
    protected $_verlag;
    protected $_erscheinungsort;
    protected $_erscheinungsjahr;

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
     * @param mixed $beitragstitel
     * @return $this
     */
    public function setBeitragstitel($beitragstitel)
    {
        $this->_beitragstitel = $beitragstitel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBeitragstitel()
    {
        return $this->_beitragstitel;
    }

    /**
     * @param mixed $buchtitel
     * @return $this
     */
    public function setBuchtitel($buchtitel)
    {
        $this->_buchtitel = $buchtitel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBuchtitel()
    {
        return $this->_buchtitel;
    }

    /**
     * @param mixed $erscheinungsjahr
     * @return $this
     */
    public function setErscheinungsjahr($erscheinungsjahr)
    {
        $this->_erscheinungsjahr = $erscheinungsjahr;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErscheinungsjahr()
    {
        return $this->_erscheinungsjahr;
    }

    /**
     * @param mixed $erscheinungsort
     * @return $this
     */
    public function setErscheinungsort($erscheinungsort)
    {
        $this->_erscheinungsort = $erscheinungsort;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getErscheinungsort()
    {
        return $this->_erscheinungsort;
    }

    /**
     * @param mixed $herausgeber
     * @return $this
     */
    public function setHerausgeber($herausgeber)
    {
        $this->_herausgeber = $herausgeber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHerausgeber()
    {
        return $this->_herausgeber;
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
     * @param mixed $verfasser
     * @return $this
     */
    public function setVerfasser($verfasser)
    {
        $this->_verfasser = $verfasser;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerfasser()
    {
        return $this->_verfasser;
    }

    /**
     * @param mixed $verlag
     * @return $this
     */
    public function setVerlag($verlag)
    {
        $this->_verlag = $verlag;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVerlag()
    {
        return $this->_verlag;
    }
}