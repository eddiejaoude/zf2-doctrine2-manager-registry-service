<?php
namespace EddieJaoude\Zf2Doctrine2ManagerRegistryService\Registry;

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
            $this->getEntityManagers($options['entitymanager']),
            'orm_default',
            'orm_default',
            'Doctrine\ORM\Proxy\Proxy'
        );
    }

    /**
      * @param array
      * @return array
      */
    public function getEntityManagers(array $options)
    {
        $entityManagers = array();
        foreach ($options as $key => $entityManager) {
            $entityManagers[$key] = 'doctrine.entitymanager.' . $key;
        }

        return $entityManagers;
    }


    /**
      * @param array
      * @return array
      */
    public function getConnections(array $options)
    {
        $connections = array();
        foreach ($options as $key => $connection) {
            $connections[$key] = 'doctrine.connection.' . $key;
        }

        return $connections;
    }
}
