<?php

class Application_Model_ModulLiteraturMapper
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
            $this->setDbTable('Application_Model_DbTable_ModulLiteratur');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_ModulLiteratur $modulLiteratur)
    {
        $data = array(
            'idModul'   => $modulLiteratur->getIdModul(),
            'idLiteratur' => $modulLiteratur->getIdLiteratur(),
        );

        if (null === ($id = $modulLiteratur->getId())) {
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idModul = ?' => $id));
        }
    }

    public function find($id, Application_Model_ModulLiteratur $modulLiteratur)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $modulLiteratur->setIdModul($row->idModul)
                  ->setIdLiteratur($row->idLiteratur);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_ModulLiteratur();
            $entry->setIdModul($row->idModul)
                ->setIdLiteratur($row->idLiteratur);
            $entries[] = $entry;
        }
        return $entries;
    }
}

