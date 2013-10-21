<?php
namespace Directory\Model;

use Zend\Db\TableGateway\TableGateway;

class PersonTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function search($firstname)
    {
        $rowset = $this->tableGateway->select(array('firstname' => $firstname));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row");
        }
        return $row;
    }


}