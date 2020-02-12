<?php

namespace FondOfSpryker\Zed\ConcreteProductApi\Business\Mapper;

use Generated\Shared\Transfer\ConcreteProductApiTransfer;

class TransferMapper implements TransferMapperInterface
{
    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ConcreteProductApiTransfer
     */
    public function toTransfer(array $data): ConcreteProductApiTransfer
    {
        return (new ConcreteProductApiTransfer())->fromArray($data, true);
    }

    /**
     * @param array $data
     *
     * @return \Generated\Shared\Transfer\ConcreteProductApiTransfer[]
     */
    public function toTransferCollection(array $data): array
    {
        $transferCollection = [];

        foreach ($data as $itemData) {
            $transferCollection[] = $this->toTransfer($itemData);
        }

        return $transferCollection;
    }
}
