<?php
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
            ),
        ),
    'router' => array(
        'routes' => array(
            'search' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/search',
                    'defaults' => array(
                        'controller' => 'Directory\Controller\Search',
                        'action' => 'index',
                        )
                    )
                ),
            'load' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/load',
                    'defaults' => array(
                        'controller' => 'Directory\Controller\Search',
                        'action' => 'load',
                        )
                    )
                )
            )
        ),
    'controllers' => array(
        'invokables' => array(
            'Directory\Controller\Search' => 'Directory\Controller\SearchController'
            )
        )
);