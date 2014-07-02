<?php

class Application_Model_LiteraturMapper
{
    protected $_dbTable;

    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Literatur');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Literatur $literatur)
    {
        $data = array(
            'Buchtitel'   => $literatur->getBuchtitel(),
            'Verfasser' => $literatur->getVerfasser(),
            'Beitragstitel'   => $literatur->getBeitragstitel(),
            'Herausgeber'   => $literatur->getHerausgeber(),
            'Verlag'   => $literatur->getVerlag(),
            'Erscheinungsort'   => $literatur->getErscheinungsort(),
            'Erscheinungsjahr'   => $literatur->getErscheinungsjahr()
        );

        if (null === ($id = $literatur->getIdLiteratur())) {
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idLiteratur = ?' => $id));
        }
    }

    public function find($id, Application_Model_Literatur $literatur)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $literatur->setIdLiteratur($row->idLiteratur)
                  ->setBuchtitel($row->Buchtitel)
                  ->setBeitragstitel($row->Beitragstitel)
                  ->setHerausgeber($row->Herausgeber)
                  ->setVerlag($row->Verlag)
                  ->setErscheinungsjahr($row->Erscheinungsjahr)
                  ->setErscheinungsort($row->Erscheinungsort);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Literatur();
            $entry->setIdLiteratur($row->idLiteratur)
                ->setBuchtitel($row->Buchtitel)
                ->setBeitragstitel($row->Beitragstitel)
                ->setHerausgeber($row->Herausgeber)
                ->setVerlag($row->Verlag)
                ->setErscheinungsjahr($row->Erscheinungsjahr)
                ->setErscheinungsort($row->Erscheinungsort);
            $entries[] = $entry;
        }
        return $entries;
    }
    public function fetchLast()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Literatur();
            $entry->setIdLiteratur($row->idLiteratur)
                ->setBuchtitel($row->Buchtitel)
                ->setBeitragstitel($row->Beitragstitel)
                ->setHerausgeber($row->Herausgeber)
                ->setVerlag($row->Verlag)
                ->setErscheinungsjahr($row->Erscheinungsjahr)
                ->setErscheinungsort($row->Erscheinungsort);
            $entries[] = $entry;
        }
        return $entries[count($entries)-1];
    }
}

