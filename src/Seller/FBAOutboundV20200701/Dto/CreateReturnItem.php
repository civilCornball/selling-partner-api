<?php

namespace SellingPartnerApi\Seller\FBAOutboundV20200701\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class CreateReturnItem extends BaseDto
{
    /**
     * @param  string  $sellerReturnItemId An identifier assigned by the seller to the return item.
     * @param  string  $sellerFulfillmentOrderItemId The identifier assigned to the item by the seller when the fulfillment order was created.
     * @param  string  $amazonShipmentId The identifier for the shipment that is associated with the return item.
     * @param  string  $returnReasonCode The return reason code assigned to the return item by the seller.
     * @param  string  $returnComment An optional comment about the return item.
     */
    public function __construct(
        public readonly ?string $sellerReturnItemId = null,
        public readonly ?string $sellerFulfillmentOrderItemId = null,
        public readonly ?string $amazonShipmentId = null,
        public readonly ?string $returnReasonCode = null,
        public readonly ?string $returnComment = null,
        mixed ...$additionalProperties,
    ) {
        parent::__construct(...$additionalProperties);
    }
}