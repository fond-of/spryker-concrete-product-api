<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Persistence;

use FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiDependencyProvider;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\ConcreteProductApi\ConcreteProductApiConfig getConfig()
 * @method \FondOfSpryker\Zed\ConcreteProductApi\Persistence\ConcreteProductApiQueryContainerInterface getQueryContainer()
 */
class ConcreteProductApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Product\Persistence\SpyProductQuery
     */
    public function getProductQuery(): SpyProductQuery
    {
        return $this->getProvidedDependency(ConcreteProductApiDependencyProvider::PROPEL_QUERY_PRODUCT);
    }
}
