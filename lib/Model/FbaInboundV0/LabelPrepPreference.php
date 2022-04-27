<?php
/**
 * LabelPrepPreference
 *
 * PHP version 7.3
 *
 * @category Class
 * @package  SellingPartnerApi
 */

/**
 * Selling Partner API for Fulfillment Inbound
 *
 * The Selling Partner API for Fulfillment Inbound lets you create applications that create and update inbound shipments of inventory to Amazon's fulfillment network.
 *
 * The version of the OpenAPI document: v0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SellingPartnerApi\Model\FbaInboundV0;
use \SellingPartnerApi\ObjectSerializer;
use \SellingPartnerApi\Model\ModelInterface;

/**
 * LabelPrepPreference Class Doc Comment
 *
 * @category Class
 * @description The preference for label preparation for an inbound shipment.
 * @package  SellingPartnerApi
 * @group 
 */
class LabelPrepPreference
{
    /**
     * Possible values of this enum
     */
    const SELLER_LABEL = 'SELLER_LABEL';
    const AMAZON_LABEL_ONLY = 'AMAZON_LABEL_ONLY';
    const AMAZON_LABEL_PREFERRED = 'AMAZON_LABEL_PREFERRED';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::SELLER_LABEL,
            self::AMAZON_LABEL_ONLY,
            self::AMAZON_LABEL_PREFERRED,
        ];
    }
}

