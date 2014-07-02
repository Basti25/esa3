<?php

class Application_Model_ModulMapper
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
            $this->setDbTable('Application_Model_DbTable_Modul');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Modul $modul)
    {
        $data = array(
            'Bezeichnung'   => $modul->getBezeichnung(),
            'Kurzbeschreibung' => $modul->getKurzbeschreibung(),
            'Semester' => $modul->getSemester(),
            'Dozent' => $modul->getDozent()
        );
        if (null === ($id = $modul->getIdModul())) {
            unset($data['idModul']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idModul = ?' => $id));
        }
    }

    public function find($id, Application_Model_Modul $modul)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $modul->setIdModul($row->idModul)
                  ->setBezeichnung($row->Bezeichnung)
                  ->setKurzbeschreibung($row->Kurzbeschreibung)
                  ->setSemester($row->Semester)
                  ->setDozent($row->Dozent);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Modul();
            $entry->setIdModul($row->idModul)
                ->setBezeichnung($row->Bezeichnung)
                ->setKurzbeschreibung($row->Kurzbeschreibung)
                ->setSemester($row->Semester)
                ->setDozent($row->Dozent);
            $entries[] = $entry;
        }
        return $entries;
    }
}

