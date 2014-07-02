<?php

class Application_Model_InternetquelleMapper
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
            $this->setDbTable('Application_Model_DbTable_Internetquelle');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Internetquelle $internetquelle)
    {
        $data = array(
            'url'   => $internetquelle->getUrl(),
            'titel' => $internetquelle->getTitel()
        );

        if (null === ($id = $internetquelle->getIdInternetquelle())) {
            unset($data['idInternetquelle']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('idInternetquelle = ?' => $id));
        }
    }

    public function find($id, Application_Model_Internetquelle $internetquelle)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $internetquelle->setIdInternetquelle($row->idInternetquelle)
                  ->setTitel($row->titel)
                  ->setUrl($row->url);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Internetquelle();
            $entry->setIdInternetquelle($row->idInternetquelle)
                ->setTitel($row->Titel)
                ->setUrl($row->URL);
            $entries[] = $entry;
        }
        return $entries;
    }

    public function fetchLast()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Internetquelle();
            $entry->setIdInternetquelle($row->idInternetquelle)
                ->setTitel($row->Titel)
                ->setUrl($row->URL);
            $entries[] = $entry;
        }
        return $entries[count($entries)-1];
    }
}

