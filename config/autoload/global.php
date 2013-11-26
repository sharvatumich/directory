<?php
return array(
    'db' => array(
        // 'driver'         => 'Pdo',
        // 'dsn'            => 'mysql:dbname=caen;host=localhost',
        // 'driver_options' => array(
        //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        // ),
        'driver'            => 'oci8',
        'connection' => 'oratest',
        'character_set'     => 'AL32UTF8',
        'platform_options' => array('quote_identifiers' => false),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                    => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);