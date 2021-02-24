<?php
/**
 * ReturnItemDisposition
 *
 * PHP version 7.2
 *
 * @category Class
 * @package  Evers\SellingPartnerApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Selling Partner APIs for Fulfillment Outbound
 *
 * The Selling Partner API for Fulfillment Outbound lets you create applications that help a seller fulfill Multi-Channel Fulfillment orders using their inventory in Amazon's fulfillment network. You can get information on both potential and existing fulfillment orders.
 *
 * The version of the OpenAPI document: 2020-07-01
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Evers\SellingPartnerApi\Model;
use \Evers\SellingPartnerApi\ObjectSerializer;

/**
 * ReturnItemDisposition Class Doc Comment
 *
 * @category Class
 * @description The condition of the return item when received by an Amazon fulfillment center.
 * @package  Evers\SellingPartnerApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ReturnItemDisposition
{
    /**
     * Possible values of this enum
     */
    const SELLABLE = 'Sellable';
    const DEFECTIVE = 'Defective';
    const CUSTOMER_DAMAGED = 'CustomerDamaged';
    const CARRIER_DAMAGED = 'CarrierDamaged';
    const FULFILLER_DAMAGED = 'FulfillerDamaged';
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::SELLABLE,
            self::DEFECTIVE,
            self::CUSTOMER_DAMAGED,
            self::CARRIER_DAMAGED,
            self::FULFILLER_DAMAGED,
        ];
    }
}


