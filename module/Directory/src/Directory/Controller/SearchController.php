<?php
namespace Directory\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SearchController extends AbstractActionController
{
    protected $personTable;
    protected $phoneTable;

    public function getPersonTable()
    {
        if (!$this->personTable)
        {
            $sm = $this->getServiceLocator();
            $this->personTable = $sm->get('Directory\Model\PersonTable');
        }

        return $this->personTable;
    }

    public function getPhoneTable()
    {
        if(!$this->phoneTable)
        {
            $sm = $this->getServiceLocator();
            $this->phoneTable = $sm->get('Directory\Model\PhoneTable');
        }

        return $this->phoneTable;
    }
    public function indexAction()
    {
        //return new ViewModel(array('greeting' => 'hello, world'));

    }

    public function loadAction()
    {
        $firstname = $this->getRequest()->getPost('firstname');
        $lastname = $this->getRequest()->getPost('lastname');
        $uniqname = $this->getRequest()->getPost('uniqname');
        $umid = $this->getRequest()->getPost('umid');
        $middlename = $this->getRequest()->getPost('middlename');
        $nickname = $this->getRequest()->getPost('nickname');

        $caenid = $this->getRequest()->getPost('caenid');

        $zipcode = $this->getRequest()->getPost('zipcode');
        $currentStreet = $this->getRequest()->getPost('currentStreet');

        $areacode = $this->getRequest()->getPost('areacode');

        $person = $this->getPersonTable()->search($firstname, $lastname, $umid, $uniqname, $middlename, $nickname, $zipcode, $currentStreet);

        $phone = $this->getPhoneTable()->search($areacode);
        //$person = $this->getPersonTable()->fetchAll();

        //$phoneTypes = $this->getPersonTable()->loadPhoneType();


        return new ViewModel(array(
            'person' => $person,
            'phone' => $phone,
            ));

        // return new ViewModel(array(
        //     'person' => $this->getPersonTable()->fetchAll(),
        //     ));
    }
}