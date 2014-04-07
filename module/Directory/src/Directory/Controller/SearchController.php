<?php
namespace Directory\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Directory\Model\Person;

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

        $paginator = $this->getPersonTable()->fetchAll(true);
        $paginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $paginator->setItemCountPerPage(1);

        return new ViewModel(array(
            'paginator' => $paginator
            ));



        // $firstname = $this->getRequest()->getPost('firstname');
        // $lastname = $this->getRequest()->getPost('lastname');
        // $uniqname = $this->getRequest()->getPost('uniqname');
        // $umid = $this->getRequest()->getPost('umid');
        // $middlename = $this->getRequest()->getPost('middlename');
        // $nickname = $this->getRequest()->getPost('nickname');

        // $caenid = $this->getRequest()->getPost('caenid');

        // $zipcode = $this->getRequest()->getPost('zipcode');
        // $currentStreet = $this->getRequest()->getPost('currentStreet');

        // $areacode = $this->getRequest()->getPost('areacode');
        // $prefix = $this->getRequest()->getPost('prefix');
        // $number = $this->getRequest()->getPost('number');

        // //$person = $this->getPersonTable()->search($firstname, $lastname, $umid, $uniqname, $middlename, $nickname, $caenid);

        // $phone = $this->getPhoneTable()->search($areacode, $prefix, $number);
        // $person = $this->getPersonTable()->fetchAll();

        // $paginator = $this->getPersonTable()->fetchAll();

        // //$paginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));

        // //$paginator->setItemCountPerPage(10);


        // //$phoneTypes = $this->getPersonTable()->loadPhoneType();


        // return new ViewModel(array(
        //     'paginator' => $paginator
        //     ));

        // // return new ViewModel(array(
        // //     'person' => $this->getPersonTable()->fetchAll(),
        // //     ));
    }
}