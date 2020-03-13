<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Model\ConcreteProductApiInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Validator\ConcreteProductApiValidatorInterface;
use FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiDependencyProvider;
use FondOfSpryker\Zed\ConcreteProductApi\Dependency\Facade\ConcreteProductApiToProductFacadeInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryBuilderQueryContainerInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryContainerInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Persistence\ConcreteProductApiQueryContainer;
use Spryker\Zed\Kernel\Container;

class ConcreteProductApiBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConcreteProductApi\Business\ConcreteProductApiBusinessFactory
     */
    protected $concreteProductApiBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryContainerInterface
     */
    protected $concreteProductApiToApiQueryContainerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryBuilderQueryContainerInterface
     */
    protected $concreteProductApiToApiQueryBuilderQueryContainerInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Persistence\ConcreteProductApiQueryContainer
     */
    protected $concreteProductApiQueryContainerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Dependency\Facade\ConcreteProductApiToProductFacadeInterface
     */
    protected $concreteProductApiToProductFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiToApiQueryContainerInterfaceMock = $this->getMockBuilder(ConcreteProductApiToApiQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiToApiQueryBuilderQueryContainerInterfaceMock = $this->getMockBuilder(ConcreteProductApiToApiQueryBuilderQueryContainerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiQueryContainerMock = $this->getMockBuilder(ConcreteProductApiQueryContainer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiToProductFacadeInterfaceMock = $this->getMockBuilder(ConcreteProductApiToProductFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiBusinessFactory = new ConcreteProductApiBusinessFactory();
        $this->concreteProductApiBusinessFactory->setQueryContainer($this->concreteProductApiQueryContainerMock);
        $this->concreteProductApiBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateConcreteProductApi(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->withConsecutive(
                [ConcreteProductApiDependencyProvider::QUERY_CONTAINER_API],
                [ConcreteProductApiDependencyProvider::QUERY_CONTAINER_API_QUERY_BUILDER],
                [ConcreteProductApiDependencyProvider::FACADE_PRODUCT]
            )->willReturnOnConsecutiveCalls(
                $this->concreteProductApiToApiQueryContainerInterfaceMock,
                $this->concreteProductApiToApiQueryBuilderQueryContainerInterfaceMock,
                $this->concreteProductApiToProductFacadeInterfaceMock
            );

        $this->assertInstanceOf(
            ConcreteProductApiInterface::class,
            $this->concreteProductApiBusinessFactory->createConcreteProductApi()
        );
    }

    /**
     * @return void
     */
    public function testCreateConcreteProductApiValidator(): void
    {
        $this->assertInstanceOf(
            ConcreteProductApiValidatorInterface::class,
            $this->concreteProductApiBusinessFactory->createConcreteProductApiValidator()
        );
    }
}
