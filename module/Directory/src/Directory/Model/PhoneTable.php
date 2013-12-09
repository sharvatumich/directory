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

    public function search($areacode)
    {
        $rowset = $this->tableGateway->select(function (Select $select) use($areacode) {
            if (!empty($areacode)) {
                $select->where->like('AREA_CODE', $areacode);
            }
        });

        $row = $rowset->current();
        if(!$row) {
            throw new \Exception("could not find row");
        }
        return $row;
    }


}

