<?php

class Application_Model_StudienarbeitMapper
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
            $this->setDbTable('Application_Model_DbTable_Studienarbeit');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Studienarbeit $studienarbeit)
    {
        $data = array(
            'Titel'   => $studienarbeit->getTitel(),
            'Gruppenmitglieder' => $studienarbeit->getGruppenmitglieder(),
            'idModul' => $studienarbeit->getIdModul()
        );

        if (null === ($id = $studienarbeit->getIdStudienarbeit())) {
            unset($data['idStudienarbeit']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idStudienarbeit = ?' => $id));
        }
    }

    public function find($id, Application_Model_Studienarbeit $studienarbeit)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $studienarbeit->setIdStudienarbeit($row->idStudienarbeit)
                  ->setTitel($row->Titel)
                  ->setGruppenmitglieder($row->Gruppenmitglieder)
                  ->setIdModul($row->idModul);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Studienarbeit();
            $entry->setIdStudienarbeit($row->idStudienarbeit)
                ->setTitel($row->Titel)
                ->setGruppenmitglieder($row->Gruppenmitglieder)
                ->setIdModul($row->idModul);
            $entries[] = $entry;
        }
        return $entries;
    }
}

