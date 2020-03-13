<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Model\ConcreteProductApiInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Validator\ConcreteProductApiValidatorInterface;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;

class ConcreteProductApiFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConcreteProductApi\Business\ConcreteProductApiFacade
     */
    protected $concreteProductApiFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Business\ConcreteProductApiBusinessFactory
     */
    protected $concreteProductApiBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Business\Validator\ConcreteProductApiValidatorInterface
     */
    protected $concreteProductApiValidatorInterfaceMock;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Business\Model\ConcreteProductApiInterface
     */
    protected $concreteProductApiInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiItemTransfer
     */
    protected $apiItemTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiRequestTransfer
     */
    protected $apiRequestTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiCollectionTransfer
     */
    protected $apiCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->concreteProductApiBusinessFactoryMock = $this->getMockBuilder(ConcreteProductApiBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiDataTransferMock = $this->getMockBuilder(ApiDataTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiValidatorInterfaceMock = $this->getMockBuilder(ConcreteProductApiValidatorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 1;

        $this->concreteProductApiInterfaceMock = $this->getMockBuilder(ConcreteProductApiInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiItemTransferMock = $this->getMockBuilder(ApiItemTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiRequestTransferMock = $this->getMockBuilder(ApiRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiCollectionTransferMock = $this->getMockBuilder(ApiCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiFacade = new ConcreteProductApiFacade();
        $this->concreteProductApiFacade->setFactory($this->concreteProductApiBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testValidate(): void
    {
        $this->concreteProductApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConcreteProductApiValidator')
            ->willReturn($this->concreteProductApiValidatorInterfaceMock);

        $this->concreteProductApiValidatorInterfaceMock->expects($this->atLeastOnce())
            ->method('validate')
            ->with($this->apiDataTransferMock)
            ->willReturn([]);

        $this->assertIsArray(
            $this->concreteProductApiFacade->validate(
                $this->apiDataTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testGetConcreteProduct(): void
    {
        $this->concreteProductApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConcreteProductApi')
            ->willReturn($this->concreteProductApiInterfaceMock);

        $this->concreteProductApiInterfaceMock->expects($this->atLeastOnce())
            ->method('get')
            ->with($this->id)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->concreteProductApiFacade->getConcreteProduct($this->id)
        );
    }

    /**
     * @return void
     */
    public function testFindConditionalProducts(): void
    {
        $this->concreteProductApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createConcreteProductApi')
            ->willReturn($this->concreteProductApiInterfaceMock);

        $this->concreteProductApiInterfaceMock->expects($this->atLeastOnce())
            ->method('find')
            ->with($this->apiRequestTransferMock)
            ->willReturn($this->apiCollectionTransferMock);

        $this->assertInstanceOf(
            ApiCollectionTransfer::class,
            $this->concreteProductApiFacade->findConditionalProducts(
                $this->apiRequestTransferMock
            )
        );
    }
}
