<?php
namespace Base;
/**
* Zend Framework (http://framework.zend.com/)
*
* @link http://github.com/zendframework/ZendSkeletonBase for the canonical source repository
* @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
* @license http://framework.zend.com/license/new-bsd New BSD License
*/
return array(
    'acl' => array(
        'Base' => array(
            'TI' => array(
                'Base\Controller\Index:index',
            ),
            'RH - ADP' => array(
                'Base\Controller\Index:index',
            ),
            'CONTROLADORIA'=>array(
                'Base\Controller\Index:index',
            ),
            'ALMOXARIFADO'=>array(
                'Base\Controller\Index:index',
            ),
            'COMPRAS'=>array(
                'Base\Controller\Index:index',
            ),
            'DIRETORIA'=>array(
                'Base\Controller\Index:index',
            ),
            'FABRICAÇÃO'=>array(
                'Base\Controller\Index:index',
            ),
            'FINANCEIRO - CONTÁBIL'=>array(
                'Base\Controller\Index:index',
            ),
            'FISCAL'=>array(
                'Base\Controller\Index:index',
            ),
            'LOGÍSTICA'=>array(
                'Base\Controller\Index:index',
            ),
            'OCTG - ADMINISTRATIVO'=>array(
                'Base\Controller\Index:index',
            ),
            'OCTG - INSPEÇÃO'=>array(
                'Base\Controller\Index:index',
            ),
            'OCTG - MACHINE SHOP'=>array(
                'Base\Controller\Index:index',
            ),
            'OCTG - VÁLVULAS'=>array(
                'Base\Controller\Index:index',
            ),
            'OPERACIONAL - OFFSHORE'=>array(
                'Base\Controller\Index:index',
            ),
            'PROJETOS ESPECIAIS'=>array(
                'Base\Controller\Index:index',
            ),
            'QUALIDADE'=>array(
                'Base\Controller\Index:index',
            ),
            'RELATÓRIO'=>array(
                'Base\Controller\Index:index',
            ),
            'RH'=>array(
                'Base\Controller\Index:index',
            ),           
            'RH - GT'=>array(
                'Base\Controller\Index:index',
            ),
            'RH - T&D'=>array(
                'Base\Controller\Index:index',
            ),
            'SMS'=>array(
                'Base\Controller\Index:index',
            ),
            'TRANSPORTE'=>array(
                'Base\Controller\Index:index',
            ),
            'PLANEJAMENTO'=>array(
                'Base\Controller\Index:index',
            ),
            'JURIDICO'=>array(
                'Base\Controller\Index:index',
            ),
        ),
    ),
      'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            __NAMESPACE__ . '_driver_alternative' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            ),
            'orm_alternative' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver_alternative'
                )
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Base\Controller\Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array()
            ),
            'convite-hora-extra' => array(
                'type' => 'Literal',
                'may_terminate' => true,
                'options' => array(
                    'route' => '/convite-hora-extra',
                    'defaults' => array(
                        'controller' => 'DP\Controller\ConviteHoraExtra',
                        'action' => 'index',
                    ),
                ),
                'child_routes' => array(
                    'single-store' => array(
                        'type' => 'Literal',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/convite-individual',
                            'defaults' => array(
                                'action' => 'storesingle',
                            ),
                        ),
                    ),
                    'group-store' => array(
                        'type' => 'Literal',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/convite-coletivo',
                            'defaults' => array(
                                'action' => 'storegroup',
                            ),
                        ),
                    ),
                    'me' => array(
                        'type' => 'Literal',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/me',
                            'defaults' => array(
                                'action' => 'me',
                            ),
                        ),
                    ),
                    'aprovedme' => array(
                        'type' => 'Literal',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/approved-me',
                            'defaults' => array(
                                'action' => 'aprovedme',
                            ),
                        ),
                    ),
                    'negar' => array(
                        'type' => 'Segment',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/negar/:id',
                            'defaults' => array(
                                'action' => 'negar',
                                'id' => 0
                            ),
                        ),
                    ),
                    'aprovar' => array(
                        'type' => 'Segment',
                        'may_terminate' => true,
                        'options' => array(
                            'route' => '/aprovar/:id',
                            'defaults' => array(
                                'action' => 'aprovar',
                                'id' => 0
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
            'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'pt_BR',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Base\Controller\Index' => 'Base\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'base/index/index' => __DIR__ . '/../view/base/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            'partials/navigation' => __DIR__ . '/../view/navigation.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
       'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                __DIR__ . '/../public',
            ),
        ),
    ),
// 'navigation' => array(
// // The DefaultNavigationFactory we configured in (1) uses 'default' as the sitemap key
// 'default' => array(
// // And finally, here is where we define our page hierarchy
// 'base' => array(
// 'label' => 'Página principal',
// 'route' => 'home',
// ),
// ),
// ),
);