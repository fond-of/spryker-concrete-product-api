<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Persistence;

use Orm\Zed\Product\Persistence\SpyProductQuery;

interface ConcreteProductApiQueryContainerInterface
{
    /**
     * @return \Orm\Zed\Product\Persistence\SpyProductQuery
     */
    public function queryFind(): SpyProductQuery;
}
