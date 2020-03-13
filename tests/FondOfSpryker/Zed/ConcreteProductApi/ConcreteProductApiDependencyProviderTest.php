<?php

namespace FondOfSpryker\Zed\ConcreteProductApi;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class ConcreteProductApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiDependencyProvider
     */
    protected $concreteProductApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiDependencyProvider = new ConcreteProductApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->concreteProductApiDependencyProvider->provideBusinessLayerDependencies(
                $this->containerMock
            )
        );
    }

    /**
     * @return void
     */
    public function testProvidePersistenceLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->concreteProductApiDependencyProvider->providePersistenceLayerDependencies(
                $this->containerMock
            )
        );
    }
}
