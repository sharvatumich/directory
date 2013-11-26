<?php
namespace Directory\Model;

class Person
{
    public $UNIQNAME;
    public $UMID;
    public $FNAME;
    public $LNAME;
    public $CAEN_ID;
    public $STATUS;
    public $MNAME;
    public $CARDVERNUM;
    public $OVERWRITABLE;
    public $SECURITY_FLAG;
    public $DATE_CREATED;
    public $CREATED_BY;
    public $LAST_UPDATE;
    public $LAST_UPDATED_BY;
    public $NAME_SUFFIX;
    public $NICKNAME;


    public function exchangeArray($data)
    {
        $this->CAEN_ID          = (!empty($data['CAEN_ID'])) ? $data['CAEN_ID'] : null;
        $this->STATUS           = (!empty($data['STATUS'])) ? $data['STATUS'] : null;
        $this->LNAME            = (!empty($data['LNAME'])) ? $data['LNAME'] : null;
        $this->FNAME            = (!empty($data['FNAME'])) ? $data['FNAME'] : null;
        $this->MNAME            = (!empty($data['MNAME'])) ? $data['MNAME'] : null;
        $this->UMID             = (!empty($data['UMID'])) ? $data['UMID'] : null;
        $this->CARDVERNUM       = (!empty($data['CARDVERNUM'])) ? $data['CARDVERNUM'] : null;
        $this->UNIQNAME         = (!empty($data['UNIQNAME'])) ? $data['UNIQNAME'] : null;
        $this->OVERWRITABLE     = (!empty($data['OVERWRITABLE'])) ? $data['OVERWRITABLE'] : null;
        $this->SECURITY_FLAG    = (!empty($data['SECURITY_FLAG'])) ? $data['SECURITY_FLAG'] : null;
        $this->DATE_CREATED     = (!empty($data['DATE_CREATED'])) ? $data['DATE_CREATED'] : null;
        $this->CREATED_BY       = (!empty($data['CREATED_BY'])) ? $data['CREATED_BY'] : null;
        $this->LAST_UPDATE      = (!empty($data['LAST_UPDATE'])) ? $data['LAST_UPDATE'] : null;
        $this->LAST_UPDATED_BY  = (!empty($data['LAST_UPDATED_BY'])) ? $data['LAST_UPDATED_BY'] : null;
        $this->NAME_SUFFIX      = (!empty($data['NAME_SUFFIX'])) ? $data['NAME_SUFFIX'] : null;
        $this->NICKNAME         = (!empty($data['NICKNAME'])) ? $data['NICKNAME'] : null;
    }
}