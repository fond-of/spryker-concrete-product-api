<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Business;

use FondOfSpryker\Zed\ConcreteProductApi\Business\Mapper\TransferMapper;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Mapper\TransferMapperInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Model\ConcreteProductApi;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Model\ConcreteProductApiInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Validator\ConcreteProductApiValidator;
use FondOfSpryker\Zed\ConcreteProductApi\Business\Validator\ConcreteProductApiValidatorInterface;
use FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiDependencyProvider;
use FondOfSpryker\Zed\ConcreteProductApi\Dependency\Facade\ConcreteProductApiToProductFacadeInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryBuilderQueryContainerInterface;
use FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryContainerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiConfig getConfig()
 * @method \FondOfSpryker\Zed\ConcreteProductApi\Persistence\ConcreteProductApiQueryContainerInterface getQueryContainer()
 */
class ConcreteProductApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\ConcreteProductApi\Business\Model\ConcreteProductApiInterface
     */
    public function createConcreteProductApi(): ConcreteProductApiInterface
    {
        return new ConcreteProductApi(
            $this->getApiQueryContainer(),
            $this->getApiQueryBuilderQueryContainer(),
            $this->getQueryContainer(),
            $this->getProductFacade(),
            $this->createTransferMapper()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\ConcreteProductApi\Business\Mapper\TransferMapperInterface
     */
    public function createTransferMapper(): TransferMapperInterface
    {
        return new TransferMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\ConcreteProductApi\Dependency\Facade\ConcreteProductApiToProductFacadeInterface
     */
    protected function getProductFacade(): ConcreteProductApiToProductFacadeInterface
    {
        return $this->getProvidedDependency(ConcreteProductApiDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryContainerInterface
     */
    protected function getApiQueryContainer(): ConcreteProductApiToApiQueryContainerInterface
    {
        return $this->getProvidedDependency(ConcreteProductApiDependencyProvider::QUERY_CONTAINER_API);
    }

    /**
     * @return \FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer\ConcreteProductApiToApiQueryBuilderQueryContainerInterface
     */
    protected function getApiQueryBuilderQueryContainer(): ConcreteProductApiToApiQueryBuilderQueryContainerInterface
    {
        return $this->getProvidedDependency(ConcreteProductApiDependencyProvider::QUERY_CONTAINER_API_QUERY_BUILDER);
    }

    /**
     * @return \FondOfSpryker\Zed\ConcreteProductApi\Business\Validator\ConcreteProductApiValidatorInterface
     */
    public function createConcreteProductApiValidator(): ConcreteProductApiValidatorInterface
    {
        return new ConcreteProductApiValidator();
    }
}
