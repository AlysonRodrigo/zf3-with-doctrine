<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Agenda;

use Agenda\Controller\UserController;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'agenda' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/agenda[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'user-register' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/user/register',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action' => 'register'
                    ]
                ]
            ],
            'user-login' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/user/login',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action' => 'login'
                    ]
                ]
            ],
            'user-logout' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/user/logout',
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action' => 'logout'
                    ]
                ]
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\UserController::class => InvokableFactory::class
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'agenda/index/index' => __DIR__ . '/../view/agenda/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => PDOMySqlDriver::class,
                'params' => [
                    'host'     => '127.0.0.1',
                    'user'     => 'root',
                    'password' => 'computacao2014',
                    'dbname'   => 'db_agenda',
                ]
            ],
        ],
        'driver' => [
            __NAMESPACE__ . '_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ]
            ]
        ]
    ],
];
