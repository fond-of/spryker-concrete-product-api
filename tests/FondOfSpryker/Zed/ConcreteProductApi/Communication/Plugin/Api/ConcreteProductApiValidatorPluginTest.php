<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Communication\Plugin\Api;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\ConcreteProductApi\Business\ConcreteProductApiFacade;
use FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;

class ConcreteProductApiValidatorPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\ConcreteProductApi\Communication\Plugin\Api\ConcreteProductApiValidatorPlugin
     */
    protected $concreteProductApiValidatorPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiDataTransfer
     */
    protected $apiDataTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\ConcreteProductApi\Business\ConcreteProductApiFacade
     */
    protected $concreteProductApiFacadeMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->concreteProductApiFacadeMock = $this->getMockBuilder(ConcreteProductApiFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiDataTransferMock = $this->getMockBuilder(ApiDataTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiValidatorPlugin = new ConcreteProductApiValidatorPlugin();
        $this->concreteProductApiValidatorPlugin->setFacade($this->concreteProductApiFacadeMock);
    }

    /**
     * @return void
     */
    public function testGetResourceName(): void
    {
        $this->assertSame(
            ConcreteProductApiConfig::RESOURCE_CONCRETE_PRODUCTS,
            $this->concreteProductApiValidatorPlugin->getResourceName()
        );
    }

    /**
     * @return void
     */
    public function testValidate(): void
    {
        $this->concreteProductApiFacadeMock->expects($this->atLeastOnce())
            ->method('validate')
            ->with($this->apiDataTransferMock)
            ->willReturn([]);

        $this->assertIsArray(
            $this->concreteProductApiValidatorPlugin->validate(
                $this->apiDataTransferMock
            )
        );
    }
}
