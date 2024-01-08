<?php

namespace SellingPartnerApi\Seller\ProductPricingV0\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class MoneyType extends BaseDto
{
    /**
     * @param  ?string  $currencyCode The currency code in ISO 4217 format.
     * @param  ?float  $amount The monetary value.
     * @param  ?mixed  $additionalProperties
     */
    public function __construct(
        public readonly ?string $currencyCode = null,
        public readonly ?float $amount = null,
        mixed ...$additionalProperties,
    ) {
        parent::__construct(...$additionalProperties);
    }
}