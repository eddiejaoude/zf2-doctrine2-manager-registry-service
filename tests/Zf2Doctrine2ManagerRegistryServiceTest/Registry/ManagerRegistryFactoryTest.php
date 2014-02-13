<?php
namespace EddieJaoude\Tests\Zf2Doctrine2ManagerRegistryServiceTest\Registry;

use EddieJaoude\Zf2Doctrine2ManagerRegistryService\Registry\ManagerRegistryFactory;

/**
 * Class ManagerRegistryFactoryTest
 *
 * @package EddieJaoude\Zf2Doctrine2ManagerRegistryService\Tests\Zf2Doctrine2ManagerRegistryServiceTest
 */
class ManagerRegistryFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ManagerRegistryFactory
     */
    private $instance;

    public function setUp()
    {
        $this->instance = new ManagerRegistryFactory();
    }

    public function testGetEntityManagers()
    {
        $params = array(
            'emKey' => 'emValue'
        );

        $ems = $this->instance->getEntityManagers($params);

        $expected = array(
            'emKey' => 'doctrine.entitymanager.emKey'
        );

        $this->assertEquals($expected, $ems);
    }

    public function testGetConnections()
    {
        $params = array(
            'connKey' => 'connValue'
        );

        $conns = $this->instance->getConnections($params);

        $expected = array(
            'connKey' => 'doctrine.connection.connKey'
        );

        $this->assertEquals($expected, $conns);
    }

    public function testCreateService()
    {
        $serviceManager = \Mockery::mock('Zend\ServiceManager\ServiceLocatorInterface');
        $serviceManager->shouldReceive('get')
            ->with('Config')
            ->andReturn(
                array(
                    'doctrine' => array(
                        'connection' => array(
                            'connKey' => 'connValue'
                        ),
                        'entitymanager' => array(
                            'emKey' => 'emValue'
                        )
                    )
                )
            );

        $registry = $this->instance->createService($serviceManager);

        $this->assertInstanceOf('Doctrine\Common\Persistence\AbstractManagerRegistry', $registry);
    }
}
