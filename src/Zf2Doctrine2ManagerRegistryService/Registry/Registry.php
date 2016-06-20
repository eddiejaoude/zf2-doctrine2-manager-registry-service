<?php
namespace EddieJaoude\Zf2Doctrine2ManagerRegistryService\Registry;

use Doctrine\Common\Persistence\AbstractManagerRegistry;
use Doctrine\ORM\ORMException;
use Zend\ServiceManager\ServiceManager;

/**
 * Class Registry
 *
 * @package EddieJaoude\Zf2Doctrine2ManagerRegistryService\Registry
 */
class Registry extends AbstractManagerRegistry
{

    /**
     * @var \Zend\ServiceManager\ServiceManager
     */
    protected $serviceManager;

    /**
     * Constructor.
     *
     * @param string $name
     * @param array  $connections
     * @param array  $managers
     * @param string $defaultConnection
     * @param string $defaultManager
     * @param string $proxyInterfaceName
     * @param ServiceManager $serviceManager
     */
    public function __construct($name, array $connections, array $managers, $defaultConnection, $defaultManager, $proxyInterfaceName, ServiceManager $serviceManager)
    {
        parent::__construct(
            $name,
            $connections,
            $managers,
            $defaultConnection,
            $defaultManager,
            $proxyInterfaceName
        );

        $this->serviceManager = $serviceManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function getService($name)
    {
        return $this->serviceManager->get($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function resetService($name)
    {
        $allowOverwrite = $this->serviceManager->getAllowOverride();

        $this->serviceManager->setAllowOverride(true);
        $this->serviceManager->setService($name, null);
        $this->serviceManager->setAllowOverride($allowOverwrite);
    }

    /**
     * {@inheritdoc}
     */
    public function getAliasNamespace($alias)
    {
        foreach (array_keys($this->getManagers()) as $name) {
            try {
                return $this->getManager($name)->getConfiguration()->getEntityNamespace($alias);
            } catch (ORMException $e) {
            }
        }

        throw ORMException::unknownEntityNamespace($alias);
    }
}
