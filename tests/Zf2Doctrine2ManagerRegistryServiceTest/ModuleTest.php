<?php
namespace EddieJaoude\Zf2Doctrine2ManagerRegistryService\Tests\Zf2Doctrine2ManagerRegistryServiceTest;

use EddieJaoude\Zf2Doctrine2ManagerRegistryService\Module;
use Zend\Mvc\MvcEvent;

/**
 * Class ModuleTest
 *
 * @package EddieJaoude\Zf2Doctrine2ManagerRegistryService\Tests\Zf2Doctrine2ManagerRegistryServiceTest
 */
class ModuleTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \EddieJaoude\Zf2Doctrine2ManagerRegistryService\Module
     */
    private $instance;

    public function setUp()
    {
        $this->instance = new Module();
    }

    public function testInstance()
    {
        $this->assertInstanceOf('\EddieJaoude\Zf2Doctrine2ManagerRegistryService\Module', $this->instance);
    }

    public function testGetAutoloaderConfig()
    {
        $response = $this->instance->getAutoloaderConfig();

        $this->assertTrue(
            array_key_exists(
                'EddieJaoude\Zf2Doctrine2ManagerRegistryService',
                $response['Zend\Loader\StandardAutoloader']['namespaces']
            )
        );
    }

    public function testGetServiceConfig()
    {
        $response = $this->instance->getServiceConfig();

        $this->assertTrue(array_key_exists('factories', $response));
        $this->assertTrue(array_key_exists('Doctrine\ManagerRegistry', $response['factories']));
        $this->assertTrue(is_callable($response['factories']['Doctrine\ManagerRegistry']));
    }

    public function testOnBootstrap()
    {
        $mvcEvent = \Mockery::mock('Zend\Mvc\MvcEvent');
        $mvcEvent->shouldReceive('getApplication')
            ->andReturn(\Mockery::self());

        $mvcEvent->shouldReceive('getServiceManager')
            ->andReturn(\Mockery::self());

        $eventManager = \Mockery::mock('Zend\EventManager\EventManager')->shouldDeferMissing();

        $mvcEvent->shouldReceive('getEventManager')
            ->andReturn($eventManager);

        $this->instance->onBootstrap($mvcEvent);

        $this->assertEquals(array('route'), $eventManager->getEvents());
    }
}
