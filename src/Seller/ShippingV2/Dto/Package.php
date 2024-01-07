<?php

namespace SellingPartnerApi\Seller\ShippingV2\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class Package extends BaseDto
{
    protected static array $complexArrayTypes = ['charges' => [ChargeComponent::class], 'items' => [Item::class]];

    /**
     * @param  Dimensions  $dimensions A set of measurements for a three-dimensional object.
     * @param  Weight  $weight The weight in the units indicated.
     * @param  Currency  $currency The monetary value in the currency indicated, in ISO 4217 standard format.
     * @param  bool  $isHazmat When true, the package contains hazardous materials. Defaults to false.
     * @param  string  $sellerDisplayName The seller name displayed on the label.
     * @param  ChargeComponent[]  $charges A list of charges based on the shipping service charges applied on a package.
     * @param  string  $packageClientReferenceId A client provided unique identifier for a package being shipped. This value should be saved by the client to pass as a parameter to the getShipmentDocuments operation.
     * @param  Item[]  $items A list of items.
     */
    public function __construct(
        public readonly ?Dimensions $dimensions = null,
        public readonly ?Weight $weight = null,
        public readonly ?Currency $currency = null,
        public readonly ?bool $isHazmat = null,
        public readonly ?string $sellerDisplayName = null,
        public readonly ?array $charges = null,
        public readonly ?string $packageClientReferenceId = null,
        public readonly ?array $items = null,
        mixed ...$additionalProperties,
    ) {
        parent::__construct(...$additionalProperties);
    }
}