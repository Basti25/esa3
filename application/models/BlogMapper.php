<?php

class Application_Model_BlogMapper
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
            $this->setDbTable('Application_Model_DbTable_Blog');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_Blog $blog)
    {
        $data = array(
            'title'   => $blog->getTitle(),
            'text' => $blog->getText(),
            'created' => date('Y-m-d H:i:s'),
        );

        if (null === ($id = $blog->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    public function find($id, Application_Model_Blog $blog)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $blog->setId($row->id)
                  ->setTitle($row->title)
                  ->setText($row->text)
                  ->setCreated($row->created);
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Blog();
            $entry->setId($row->id)
                  ->setTitle($row->title)
                  ->setText($row->text)
                  ->setCreated($row->created);
            $entries[] = $entry;
        }
        return $entries;
    }
}

