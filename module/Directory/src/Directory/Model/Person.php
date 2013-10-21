<?php
namespace Directory\Model;

class Person
{
    public $uniqname;
    public $umid;
    public $firstname;
    public $lastname;

    public function exchangeArray($data)
    {
        $this->uniqname     = (!empty($data['uniqname'])) ? $data['uniqname'] : null;
        $this->umid         = (!empty($data['umid'])) ? $data['umid'] : null;
        $this->firstname    = (!empty($data['firstname'])) ? $data['firstname'] : null;
        $this->lastname     = (!empty($data['lastname'])) ? $data['lastname'] : null;
    }
}