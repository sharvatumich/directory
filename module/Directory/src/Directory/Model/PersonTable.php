<?php
namespace Directory\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Directory\Adapter\MySelect;

class PersonTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated=false)
    {
        if ($paginated)
        {
            $select = new Select('PEOPLE');
            $select->where(array('LNAME' => 'Patel'));
            $resultSetPrototype = new ResultSet();
            $resultSetPrototype->setArrayObjectPrototype(new Person());

            $paginatorAdapter = new MySelect(
                $select, $this->tableGateway->getAdapter(), $resultSetPrototype);
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        }

        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function search($firstname, $lastname, $umid, $uniqname, $middlename, $nickname, $caenid)
    {
        (array)$resultSet = new ResultSet;

        $resultSet = $this->tableGateway->select(function (Select $select) use($firstname, $lastname, $umid, $uniqname, $middlename, $nickname, $caenid) {
            $sqlStatementCreated = false;
            //$select->join('PHONE_LIST', 'PHONE_LIST.CAEN_ID = PEOPLE.CAEN_ID');
            //$select->join('ADDRESSES', 'ADDRESSES.CAEN_ID = PEOPLE.CAEN_ID');
            //$select->join('BLDG_LIST', 'BLDG_LIST.BLDG_NO = ADDRESSES.OFFICE_SITE');

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

        if (!empty($middlename)) {
            if ($sqlStatementCreated) {
                $select->where->OR;
            } else {
                $sqlStatementCreated = true;
                $select->where->like('MNAME', $middlename.'%');
            }
        }
        if (!empty($nickname)) {
            if ($sqlStatementCreated) {
                $select->where->OR;
            } else {
                $sqlStatementCreated = true;
                $select->where->like('NICKNAME', $nickname.'%');
            }
        }

        if (!empty($caenid)) {
            if ($sqlStatementCreated) {
                $select->where->OR;
            } else {
                $sqlStatementCreated = true;
                $select->where->like('CAEN_ID', $caenid.'%');
            }
        }

        });

        // $row = $rowset->current();
        // $peopleArray = $rowset->toArray();

        // if (!$row) {
        //     throw new \Exception("Could not find row");
        // }
        //return $row;
        // foreach($resultSet as $row)
        // {
        //     $row->toArray();
        // }

        return $resultSet;

    }



}