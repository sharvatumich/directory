<?php
namespace Directory\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

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

    public function search($firstname, $lastname)
    {
        $rowset = $this->tableGateway->select(function (Select $select) use($firstname, $lastname, $umid, $uniqname) {
            $select->where->like('firstname', $firstname);
            $select->where->OR;
            $select->where->like('lastname', $lastname);
            $select->limit(1);
        });
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row");
        }
        return $row;
    }


}