<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\ShippingV2\Dto;

use SellingPartnerApi\Dto;

final class ServiceSelection extends Dto
{
    /**
     * @param  string[]  $serviceId  A list of ServiceId.
     */
    public function __construct(
        public readonly array $serviceId,
    ) {
    }
}
