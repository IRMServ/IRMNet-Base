<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Base;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\ORM\Tools\SchemaTool;
use DoctrineORMModule\Service\EntityManagerFactory;
use DoctrineORMModule\Service\DBALConnectionFactory;
use DoctrineORMModule\Service\ConfigurationFactory as ORMConfigurationFactory;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
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
                'doctrine.entitymanager.orm_alternative'        => new EntityManagerFactory('orm_alternative'),
                'doctrine.connection.orm_alternative'           => new DBALConnectionFactory('orm_alternative'),
                'doctrine.configuration.orm_alternative'        => new ORMConfigurationFactory('orm_alternative'),
                ),
           );

    }

}
