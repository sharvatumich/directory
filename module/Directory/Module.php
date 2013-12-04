<?php
namespace Directory;

use Directory\Model\Person;
use Directory\Model\PersonTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Directory\Model\PersonTable' => function($sm) {
                    $tableGateway = $sm->get('PersonTableGateway');
                    $table = new PersonTable($tableGateway);
                    return $table;
                },
                'PersonTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Person());
                    return new TableGateway('PEOPLE', $dbAdapter, null, $resultSetPrototype);
                },
                'Directory\Model\PhoneTable' => function($sm) {
                    $tableGateway = $sm->get('PhoneTableGateway');
                    $table = new PhoneTable($tableGateway);
                    return $table;
                },
                'PhoneTableGateway' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Phone());
                    return new TableGateway('PHONE_LIST', $dbAdapter, null, $resultSetPrototype);
                },
                ),
            );
    }
}
