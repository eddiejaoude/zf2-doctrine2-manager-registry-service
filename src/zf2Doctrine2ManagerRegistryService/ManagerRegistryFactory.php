<?php
namespace EddieJaoude\Zf2Doctrine2ManagerRegistryService;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ManagerRegistryFactory implements FactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('Config')['doctrine'];

        return new Registry(
            'ORM',
            $this->getConnections($options['connection']),
            $this->getEntitiyManagers($options['entitymanager']),
            'orm_default',
            'orm_default',
            'Doctrine\ORM\Proxy\Proxy'
        );
    }

    public function getEntitiyManagers(array $options)
    {
        $entityManagers = array();
        foreach ($options['entitymanager'] as $key => $entityManager) {
            $entityManagers[$key] = 'doctrine.entitymanager.' . $key;
        }

        return $entityManagers;
    }

    public function getConnections(array $options)
    {
        $connections = array();
        foreach ($options as $key => $connection) {
            $connections[$key] = 'doctrine.connection.' . $key;
        }

        return $connections;
    }
}
