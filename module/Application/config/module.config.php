<?php


namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => Literal::class,
                //'type' => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    
                    'seten' => array(
                		'type'    => 'Segment',
                		'options' => array(
                			'route'    => '/seten[/:action]',
                			'constraints' => array(
                				'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                			),
                			'defaults' => array(
                				'controller' => 'Application\Controller\Index',
                				'action'     => 'seten'                                          
                                            
                			),
                		),
                	),
                    
                    
                        'setpt' => array(
                		'type'    => 'Segment',
                		'options' => array(
                			'route'    => '/setpt[/:action]',
                			'constraints' => array(
                				'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                			),
                			'defaults' => array(
                				'controller' => 'Application\Controller\Index',
                				'action'     => 'setpt'                                          
                                            
                			),
                		),
                	),
                    
                       
                        'contactos' => array(
                		'type'    => 'Segment',
                		'options' => array(
                			'route'    => '/contactos[/:action]',
                			'constraints' => array(
                				'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                			),
                			'defaults' => array(
                				'controller' => 'Application\Controller\Index',
                				'action'     => 'contactos'                                          
                                            
                			),
                		),
                	),
                    
                    
                        'historia' => array(
                		'type'    => 'Segment',
                		'options' => array(
                			'route'    => '/historia[/:action]',
                			'constraints' => array(
                				'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                			),
                			'defaults' => array(
                				'controller' => 'Application\Controller\Index',
                				'action'     => 'historia'                                          
                                            
                			),
                		),
                	),
                    
                    
   
                    
                    'projects' => array(
                		'type'    => 'Segment',
                		'options' => array(
                			'route'    => '/projects[/:action]',
                			'constraints' => array(
                				'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                			),
                			'defaults' => array(
                				'controller' => 'Application\Controller\Index',
                				'action'     => 'projects'                                          
                                            
                			),
                		),
                	),
                        
                    'precos' => array(
                		'type'    => 'Segment',
                		'options' => array(
                			'route'    => '/precos[/:action]',
                			'constraints' => array(
                				'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                			),
                			'defaults' => array(
                				'controller' => 'Application\Controller\Index',
                				'action'     => 'precos'                                          
                                            
                			),
                		),
                	),
                    
                                           
                        'faircalc' => array(
                		'type'    => 'Segment',
                		'options' => array(
                			'route'    => '/faircalc[/:action][/:id]',
                		         'constraints' => array(
                                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                            'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                            'id' => '[0-9]*',
                                            ),
                			'defaults' => array(
                				'controller' => 'Application\Controller\Index',
                				'action'     => 'faircalc'                                          
                                            
                			),
                		),
                	),
                        
                    
                ),
            ),
        ),
    ),
        
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
        SuperService::class => SuperServiceFactory::class,
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
                //'text_domain' => __NAMESPACE__,
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            //'Application\Controller\Index' => 'Application\Controller\IndexController'
        ),
        'factories' => array(
            //'Application\Controller\Index'       => 'Application\Controller\Factory\IndexControllerFactory',
              'Application\Controller\Index'       => 'Application\Controller\Factory\IndexControllerFactory',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'application/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
