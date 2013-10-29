<?php
namespace Directory\Model;

class Person
{
    public $UNIQNAME;
    public $UMID;
    public $FNAME;
    public $LNAME;

    public function exchangeArray($data)
    {
        $this->UNIQNAME     = (!empty($data['UNIQNAME'])) ? $data['UNIQNAME'] : null;
        $this->UMID         = (!empty($data['UMID'])) ? $data['UMID'] : null;
        $this->FNAME    = (!empty($data['FNAME'])) ? $data['FNAME'] : null;
        $this->LNAME     = (!empty($data['LNAME'])) ? $data['LNAME'] : null;
    }
}