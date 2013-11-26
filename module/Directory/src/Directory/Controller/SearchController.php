<?php
namespace Directory\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class SearchController extends AbstractActionController
{
    protected $personTable;

    public function getPersonTable()
    {
        if (!$this->personTable)
        {
            $sm = $this->getServiceLocator();
            $this->personTable = $sm->get('Directory\Model\PersonTable');
        }

        return $this->personTable;
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

         $person = $this->getPersonTable()->search($firstname, $lastname, $umid, $uniqname, $middlename, $nickname);

        return new ViewModel(array(
            'person' => $person,
            ));

        return new ViewModel(array(
            'person' => $this->getPersonTable()->fetchAll(),
            ));
    }
}