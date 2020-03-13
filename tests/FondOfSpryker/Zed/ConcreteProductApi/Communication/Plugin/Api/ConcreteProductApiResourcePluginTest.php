<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Communication\Plugin\Api;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConcreteProductApi\Business\ConcreteProductApiFacade;
use FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiConfig;
use Generated\Shared\Transfer\ApiCollectionTransfer;
use Generated\Shared\Transfer\ApiDataTransfer;
use Generated\Shared\Transfer\ApiItemTransfer;
use Generated\Shared\Transfer\ApiRequestTransfer;

class ConcreteProductApiResourcePluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConcreteProductApi\Communication\Plugin\Api\ConcreteProductApiResourcePlugin
     */
    protected $concreteProductApiResourcePlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Business\ConcreteProductApiFacade
     */
    protected $concreteProductApiFacadeMock;

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
        $this->apiDataTransferMock = $this->getMockBuilder(ApiDataTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->id = 1;

        $this->concreteProductApiFacadeMock = $this->getMockBuilder(ConcreteProductApiFacade::class)
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

        $this->concreteProductApiResourcePlugin = new ConcreteProductApiResourcePlugin();
        $this->concreteProductApiResourcePlugin->setFacade($this->concreteProductApiFacadeMock);
    }

    /**
     * @return void
     */
    public function testGetResourceName(): void
    {
        $this->assertSame(
            ConcreteProductApiConfig::RESOURCE_CONCRETE_PRODUCTS,
            $this->concreteProductApiResourcePlugin->getResourceName()
        );
    }

    /**
     * @return void
     */
    public function testGet(): void
    {
        $this->concreteProductApiFacadeMock->expects($this->atLeastOnce())
            ->method('getConcreteProduct')
            ->with($this->id)
            ->willReturn($this->apiItemTransferMock);

        $this->assertInstanceOf(
            ApiItemTransfer::class,
            $this->concreteProductApiResourcePlugin->get(
                $this->id
            )
        );
    }

    /**
     * @return void
     */
    public function testFind(): void
    {
        $this->concreteProductApiFacadeMock->expects($this->atLeastOnce())
            ->method('findConditionalProducts')
            ->with($this->apiRequestTransferMock)
            ->willReturn($this->apiCollectionTransferMock);

        $this->assertInstanceOf(
            ApiCollectionTransfer::class,
            $this->concreteProductApiResourcePlugin->find(
                $this->apiRequestTransferMock
            )
        );
    }
}
