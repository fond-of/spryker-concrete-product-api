<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Persistence;

use Orm\Zed\Product\Persistence\SpyProductQuery;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \FondOfSpryker\Zed\ConcreteProductApi\Persistence\ConcreteProductApiPersistenceFactory getFactory()
 */
class ConcreteProductApiQueryContainer extends AbstractQueryContainer implements ConcreteProductApiQueryContainerInterface
{
    /**
     * @return \Orm\Zed\Product\Persistence\SpyProductQuery
     */
    public function queryFind(): SpyProductQuery
    {
        return $this->getFactory()->getProductQuery();
    }
}
