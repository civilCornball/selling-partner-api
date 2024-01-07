<?php

namespace SellingPartnerApi\Seller\MerchantFulfillmentV0\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class LabelFormatOption extends BaseDto
{
    /**
     * @param  bool  $includePackingSlipWithLabel When true, include a packing slip with the label.
     * @param  string  $labelFormat The label format.
     */
    public function __construct(
        public readonly bool $includePackingSlipWithLabel,
        public readonly string $labelFormat,
        mixed ...$additionalProperties,
    ) {
        parent::__construct(...$additionalProperties);
    }
}