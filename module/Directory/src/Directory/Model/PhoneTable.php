<?php
namespace Directory\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;

class PhoneTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function search($areacode, $prefix, $number)
    {
        $rowset = $this->tableGateway->select(function (Select $select) use($areacode, $prefix, $number) {
            $sqlStateCreated = false;

            if (!empty($areacode)) {
                $sqlStateCreated = true;
                $select->where->like('AREA_CODE', $areacode);
            }

            if (!empty($prefix)) {
                if ($sqlStateCreated) {
                    $select->where->OR;
                } else {
                    $sqlStateCreated = true;
                    $select->where->like('TEL_PREFIX', $prefix);
                }
            }

            if (!empty($number)) {
                if ($sqlStateCreated) {
                    $select->where->OR;
                } else {
                    $sqlStateCreated = true;
                    $select->where->like('TEL_NUMBER', $number);
                }
            }


        });

        $row = $rowset->current();
        if(!$row) {
            throw new \Exception("could not find row");
        }
        return $row;
    }


}

