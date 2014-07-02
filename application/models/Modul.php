<?php

class Application_Model_Modul
{
    protected $_bezeichnung;
    protected $_kurzbeschreibung;
    protected $_semester;
    protected $_dozent;
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
     * @param mixed $bezeichnung
     * @return $this
     */
    public function setBezeichnung($bezeichnung)
    {
        $this->_bezeichnung = $bezeichnung;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBezeichnung()
    {
        return $this->_bezeichnung;
    }

    /**
     * @param mixed $dozent
     * @return $this
     */
    public function setDozent($dozent)
    {
        $this->_dozent = $dozent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDozent()
    {
        return $this->_dozent;
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
     * @param mixed $kurzBeschreibung
     * @return $this
     */
    public function setKurzbeschreibung($kurzBeschreibung)
    {
        $this->_kurzbeschreibung = $kurzBeschreibung;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKurzbeschreibung()
    {
        return $this->_kurzbeschreibung;
    }

    /**
     * @param mixed $semester
     * @return $this
     */
    public function setSemester($semester)
    {
        $this->_semester = $semester;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSemester()
    {
        return $this->_semester;
    }
}