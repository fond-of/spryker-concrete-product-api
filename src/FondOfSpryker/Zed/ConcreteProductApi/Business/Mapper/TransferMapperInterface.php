<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Business\Mapper;

use Generated\Shared\Transfer\ConcreteProductApiTransfer;

interface TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ConcreteProductApiTransfer
     */
    public function toTransfer(array $data): ConcreteProductApiTransfer;

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ConcreteProductApiTransfer[]
     */
    public function toTransferCollection(array $data): array;
}
