<?php

class Application_Model_StudienarbeitLiteraturMapper
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
            $this->setDbTable('Application_Model_DbTable_StudienarbeitLiteratur');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_StudienarbeitLiteratur $studienarbeitLiteratur)
    {
        $data = array(
            'idStudienarbeit'   => $studienarbeitLiteratur->getIdStudienarbeit(),
            'idLiteratur' => $studienarbeitLiteratur->getIdLiteratur(),
        );

        if (null === ($id = $studienarbeitLiteratur->getId())) {
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idStudienarbeit = ?' => $id));
        }
    }

    public function find($id, Application_Model_StudienarbeitLiteratur $studienarbeitLiteratur)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $studienarbeitLiteratur->setIdStudienarbeit($row->idStudienarbeit)
                  ->setIdLiteratur($row->idLiteratur);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_StudienarbeitLiteratur();
            $entry->setIdStudienarbeit($row->idStudienarbeit)
                ->setIdLiteratur($row->idLiteratur);
            $entries[] = $entry;
        }
        return $entries;
    }
}

