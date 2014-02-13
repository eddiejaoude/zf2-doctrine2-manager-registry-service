<?php
namespace EddieJaoude\Tests\Zf2Doctrine2ManagerRegistryServiceTest\Registry;

use EddieJaoude\Zf2Doctrine2ManagerRegistryService\Registry\Registry;

/**
 * Class RegistryTest
 *
 * @package EddieJaoude\Zf2Doctrine2ManagerRegistryService\Tests\Zf2Doctrine2ManagerRegistryServiceTest
 */
class RegistryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Registry
     */
    private $instance;

    public function setUp()
    {
        $this->instance = new Registry(
            'ORM',
            array('testConnection' => true),
            array('testService' => true),
            'orm_default',
            'orm_default',
            'Doctrine\ORM\Proxy\Proxy'
        );
    }

    public function testSetServiceManager()
    {
        $serviceManager = \Mockery::mock('Zend\ServiceManager\ServiceManager');
        $serviceManager->shouldReceive('get')
            ->with('testService')
            ->andReturn(true);

        $this->assertInstanceOf(
            'EddieJaoude\Zf2Doctrine2ManagerRegistryService\Registry\Registry',
            $this->instance->setServiceManager($serviceManager)
        );
    }
}
