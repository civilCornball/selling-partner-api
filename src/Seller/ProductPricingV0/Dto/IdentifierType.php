<?php

namespace SellingPartnerApi\Seller\ProductPricingV0\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class IdentifierType extends BaseDto
{
    /**
     * @param  ?SellerSkuIdentifier  $skuIdentifier
     * @param  ?mixed  $additionalProperties
     */
    public function __construct(
        public readonly AsinIdentifier $marketplaceAsin,
        public readonly ?SellerSkuIdentifier $skuIdentifier = null,
        mixed ...$additionalProperties,
    ) {
        parent::__construct(...$additionalProperties);
    }
}