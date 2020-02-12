<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Business\Validator;

use Generated\Shared\Transfer\ApiDataTransfer;

interface ConcreteProductApiValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\ApiDataTransfer $apiDataTransfer
     *
     * @return string[]
     */
    public function validate(ApiDataTransfer $apiDataTransfer): array;
}
