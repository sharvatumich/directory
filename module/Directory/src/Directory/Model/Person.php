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
    public $AREA_CODE;
    public $TEL_PREFIX;
    public $TEL_NUMBER;
    public $TYPE;
    public $DESCRIPTION;
    public $RESTRICTED;
    public $EXTENSION;
    public $CURRENT_STREET;
    public $CURRENT_POSTAL_CODE;


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
        $this->AREA_CODE        = (!empty($data['AREA_CODE'])) ? $data['AREA_CODE'] : null;
        $this->TEL_PREFIX       = (!empty($data['TEL_PREFIX'])) ? $data['TEL_PREFIX'] : null;
        $this->TEL_NUMBER       = (!empty($data['TEL_NUMBER'])) ? $data['TEL_NUMBER'] : null;
        $this->TYPE             = (!empty($data['TYPE'])) ? $data['TYPE'] : null;
        $this->DESCRIPTION      = (!empty($data['DESCRIPTION'])) ? $data['DESCRIPTION'] : null;
        $this->RESTRICTED       = (!empty($data['RESTRICTED'])) ? $data['RESTRICTED'] : null;
        $this->EXTENSION        = (!empty($data['EXTENSION'])) ? $data['EXTENSION'] : null;
        $this->CURRENT_STREET   = (!empty($data['CURRENT_STREET'])) ? $data['CURRENT_STREET'] : null;
        $this->CURRENT_POSTAL_CODE       = (!empty($data['CURRENT_POSTAL_CODE'])) ? $data['CURRENT_POSTAL_CODE'] : null;


    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}