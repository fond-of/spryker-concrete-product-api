<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Dependency\QueryContainer;

use Generated\Shared\Transfer\ApiQueryBuilderQueryTransfer;
use Generated\Shared\Transfer\PropelQueryBuilderCriteriaTransfer;
use Propel\Runtime\ActiveQuery\ModelCriteria;

interface ConcreteProductApiToApiQueryBuilderQueryContainerInterface
{
    /**
     * @param \Propel\Runtime\ActiveQuery\ModelCriteria $query
     * @param \Generated\Shared\Transfer\ApiQueryBuilderQueryTransfer $apiQueryBuilderQueryTransfer
     *
     * @return \Propel\Runtime\ActiveQuery\ModelCriteria
     */
    public function buildQueryFromRequest(
        ModelCriteria $query,
        ApiQueryBuilderQueryTransfer $apiQueryBuilderQueryTransfer
    ): ModelCriteria;

    /**
     * @param \Generated\Shared\Transfer\ApiQueryBuilderQueryTransfer $apiQueryBuilderQueryTransfer
     *
     * @return \Generated\Shared\Transfer\PropelQueryBuilderCriteriaTransfer
     */
    public function toPropelQueryBuilderCriteria(
        ApiQueryBuilderQueryTransfer $apiQueryBuilderQueryTransfer
    ): PropelQueryBuilderCriteriaTransfer;
}
