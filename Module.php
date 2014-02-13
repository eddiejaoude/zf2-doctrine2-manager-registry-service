<?php
namespace EddieJaoude\Zf2Doctrine2ManagerRegistryService;

use EddieJaoude\Zf2Doctrine2ManagerRegistryService\Registry\ManagerRegistryFactory;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        return;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src',
                ),
            ),
        );
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Doctrine\ManagerRegistry' => function ($sm) {
                    $managerRegistryFactory = new ManagerRegistryFactory();
                    $managerRegistry = $managerRegistryFactory->createService($sm);

                    return $managerRegistry;
                },
            )
        );
    }
}
