<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Communication\Plugin\Api;

use FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiConfig;
use Generated\Shared\Transfer\ApiDataTransfer;
use Spryker\Zed\Api\Dependency\Plugin\ApiValidatorPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiConfig getConfig()
 * @method \FondOfSpryker\Zed\ConcreteProductApi\Business\ConcreteProductApiFacadeInterface getFacade()
 */
class ConcreteProductApiValidatorPlugin extends AbstractPlugin implements ApiValidatorPluginInterface
{
    /**
     * @api
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return ConcreteProductApiConfig::RESOURCE_CONCRETE_PRODUCTS;
    }

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @throws
     *
     * @return \Generated\Shared\Transfer\ApiValidationErrorTransfer[]
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array
    {
        return $this->getFacade()->validate($apiDataTransfer);
    }
}
