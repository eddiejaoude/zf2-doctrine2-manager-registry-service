<?php
namespace EddieJaoude\Tests\Zf2Doctrine2ManagerRegistryServiceTest\Registry;

use EddieJaoude\Zf2Doctrine2ManagerRegistryService\Registry\Registry;
use Zend\ServiceManager\ServiceManager;

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

    /**
     * @var ServiceManager
     */
    private $serviceManager;

    public function setUp()
    {
        $this->serviceManager = \Mockery::mock('Zend\ServiceManager\ServiceManager');

        $this->instance = new Registry(
            'ORM',
            array('testConnection' => true),
            array('testService' => true),
            'orm_default',
            'orm_default',
            'Doctrine\ORM\Proxy\Proxy',
            $this->serviceManager
        );
    }

    /**
     * @test
     */
    public function testRegistry()
    {
        $defaultManager = \Mockery::mock();

        $this->serviceManager->shouldReceive('get')
            ->with('testService')
            ->andReturn($defaultManager);

        $res = $this->instance->getManager('testService');
        $this->assertEquals($defaultManager, $res);
    }
}
