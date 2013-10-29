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

    public function search($firstname, $lastname, $umid, $uniqname)
    {
        $sqlStatementCreated = false;
        $rowset = $this->tableGateway->select(function (Select $select) use($firstname, $lastname, $umid, $uniqname) {

        if (!empty($firstname)) {
            $sqlStatementCreated = true;
            $select->where->like('FNAME', $firstname.'%');
        }

        if (!empty($lastname)) {

            if ($sqlStatementCreated) {
                $select->where->OR;
            } else {
                $sqlStatementCreated = true;
                $select->where->like('LNAME', $lastname.'%');
            }
        }

        if (!empty($umid)) {
            if ($sqlStatementCreated) {
                $select->where->OR;
            } else {
                $sqlStatementCreated = true;
                $select->where->like('UMID', '%'.$umid.'%');
            }
        }

        if (!empty($uniqname)) {
            if ($sqlStatementCreated) {
                $select->where->OR;
            } else {
                $sqlStatementCreated = true;
                $select->where->like('UNIQNAME', $uniqname.'%');
            }
        }

        $select->limit(1);
    });
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row");
        }
        return $row;
    }


}