<?php
namespace Directory\Entity;

class Person
{
    protected $uniqname;
    protected $umid;
    protected $lastname;
    protected $firstname;

    public function getUniqname()
    {
        return this->uniqname;
    }

    public function getUmid()
    {
        return this->umid;
    }

    public function getLastname()
    {
        return this->lastname;
    }

    public function getFirstname()
    {
        return this->firstname;
    }
}