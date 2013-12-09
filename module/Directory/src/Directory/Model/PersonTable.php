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

    public function loadPhoneType()
    {
        $sqlSelect = $this->tableGateway->getSql()->select();
        $sqlSelect->from('PHONE_TYPES');
        $sqlSelect->columns(array('PHONE_TYPE_ID'));

        $resultSet = $this->tableGateway->selectWith($sqlSelect);

        return $resultSet->toArray();


    }

    public function fetchAll()
    {
        $sqlSelect = $this->tableGateway->getSql()->select();
        $sqlSelect->columns(array('CAEN_ID', 'STATUS', 'LNAME', 'FNAME', 'MNAME', 'UMID', 'UNIQNAME', 'NICKNAME'));
        $sqlSelect->join('PHONE_LIST', 'PHONE_LIST.CAEN_ID = PEOPLE.CAEN_ID');

        $resultSet = $this->tableGateway->selectWith($sqlSelect);

        $row = $resultSet->current();
        if (!$row) {
            throw new \Exception("Could not find row");
        }
        return $row;
    }

    public function search($firstname, $lastname, $umid, $uniqname, $middlename, $nickname, $zipcode, $currentStreet)
    {

        $rowset = $this->tableGateway->select(function (Select $select) use($firstname, $lastname, $umid, $uniqname, $middlename, $nickname, $zipcode, $currentStreet) {
            $sqlStatementCreated = false;
            $select->join('PHONE_LIST', 'PHONE_LIST.CAEN_ID = PEOPLE.CAEN_ID');
            $select->join('ADDRESSES', 'ADDRESSES.CAEN_ID = PEOPLE.CAEN_ID');
            $select->join('BLDG_LIST', 'BLDG_LIST.BLDG_NO = ADDRESSES.OFFICE_SITE');

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
        if (!empty($zipcode)) {
            if ($sqlStatementCreated) {
                $select->where->OR;
            } else {
                $sqlStatementCreated = true;
                $select->where->like('POSTAL_ZIPCODE', $zipcode.'%');
            }
        }
        if (!empty($currentStreet)) {
            if ($sqlStatementCreated) {
                $select->where->OR;
            } else {
                $sqlStatementCreated = true;
                $select->where->like('CURRENT_STREET', $currentStreet.'%');
            }
        }

        });

        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row");
        }
        return $row;

    }



}