<?php

class Application_Model_StudienarbeitInternetquelleMapper
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
            $this->setDbTable('Application_Model_DbTable_StudienarbeitInternetquelle');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_StudienarbeitInternetquelle $studienarbeitInternetquelle)
    {
        $data = array(
            'idStudienarbeit'   => $studienarbeitInternetquelle->getIdStudienarbeit(),
            'idInternetquelle' => $studienarbeitInternetquelle->getIdInternetquelle(),
        );

        if (null === ($id = $studienarbeitInternetquelle->getId())) {
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idStudienarbeit = ?' => $id));
        }
    }

    public function find($id, Application_Model_StudienarbeitInternetquelle $studienarbeitInternetquelle)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $studienarbeitInternetquelle->setIdStudienarbeit($row->idStudienarbeit)
                  ->setIdInternetquelle($row->idInternetquelle);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_StudienarbeitInternetquelle();
            $entry->setIdStudienarbeit($row->idStudienarbeit)
                ->setIdInternetquelle($row->idInternetquelle);
            $entries[] = $entry;
        }
        return $entries;
    }
}

