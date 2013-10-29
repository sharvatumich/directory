<?php
return array(
    'db' => array(
        // 'driver'         => 'Pdo',
        // 'dsn'            => 'mysql:dbname=caen;host=localhost',
        // 'driver_options' => array(
        //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        // ),
        'driver'            => 'OCI8',
        'connection_string' => 'jdbc:oracle:thin:@oratest.engin.umich.edu:1521:engin',
        'character_set'     => 'AL32UTF8',
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                    => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
);