# Selling Partner API for PHP
A PHP library for connecting to Amazon's [Selling Partner API](https://github.com/amzn/selling-partner-api-docs/). This library is *not* for connecting to Amazon's older MWS API---if that's what you need, check out [glassfrogbooks/php-amazon-mws](https://github.com/glassfrogbooks/phpAmazonMWS).

This package is partially generated by the [OpenAPITools generator](https://github.com/OpenAPITools/openapi-generator).

## Powering companies like...

* [Wizard Industries](https://wizard-industries.com)
* [Mendota Pet](https://mendotapet.com)
* [GLE Tech](https://gletech.com)

---

If you've found this library useful, please consider [becoming a Sponsor](https://github.com/sponsors/jlevers), or making a one-time donation via the button below. I appreciate any and all support you can provide!

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/donate?business=EL4PRLAEMGXNQ&currency_code=USD)

## Requirements

* PHP 7.2 or later
* Composer

## Installation

To install the bindings via [Composer](http://getcomposer.org/), run `composer require jlevers/selling-partner-api` inside your project directory.

## Getting Started

### Prerequisites

You need a few things to get started:
* A Selling Partner API developer account
* An AWS IAM user or role configured for use with the Selling Partner API
* A Selling Partner API application

If you're looking for more information on how to set those things up, check out [this blog post](https://jesseevers.com/selling-partner-api-access/). It provides a detailed walkthrough of the whole setup process.


### Setup

The [`Configuration`](https://github.com/jlevers/selling-partner-api/blob/main/lib/Configuration.php) constructor takes a single argument: an associative array with all the configuration information that's needed to connect to the Selling Partner API:

```php
$config = new SellingPartnerApi\Configuration([
    "lwaClientId" => "<LWA client ID>",
    "lwaClientSecret" => "<LWA client secret>",
    "lwaRefreshToken" => "<LWA refresh token>",
    "awsAccessKeyId" => "<AWS access key ID>",
    "awsSecretAccessKey" => "<AWS secret access key>",
    "endpoint" => SellingPartnerApi\Endpoint::NA  // or another endpoint from lib/Endpoints.php
]);
```

If you created your Selling Partner API application using an IAM role ARN instead of a user ARN, pass that role ARN in the configuration array:

```php
$config = new SellingPartnerApi\Configuration([
    "lwaClientId" => "<LWA client ID>",
    "lwaClientSecret" => "<LWA client secret>",
    "lwaRefreshToken" => "<LWA refresh token>",
    "awsAccessKeyId" => "<AWS access key ID>",
    "awsSecretAccessKey" => "<AWS secret access key>",
    "endpoint" => SellingPartnerApi\Endpoint::NA,  // or another endpoint from lib/Endpoints.php
    "roleArn" => "<Role ARN>"
]);
```

`$config` can then be passed into the constructor of any `SellingPartnerApi\Api\*Api` class. See the `Example` section for a complete example.

##### Configuration options

The array passed to the `Configuration` constructor accepts the following keys:

* `lwaClientId (string)`: Required. The LWA client ID of the SP API application to use to execute API requests.
* `lwaClientSecret (string)`: Required. The LWA client secret of the SP API application to use to execute API requests.
* `lwaRefreshToken (string)`: Required. The LWA refresh token of the SP API application to use to execute API requests.
* `awsAccessKeyId (string)`: Required. AWS IAM user Access Key ID with SP API ExecuteAPI permissions.
* `awsSecretAccessKey (string)`: Required. AWS IAM user Secret Access Key with SP API ExecuteAPI permissions.
* `endpoint (array)`: Required. An array containing a `url` key (the endpoint URL) and a `region` key (the AWS region). There are predefined constants for these arrays in [`lib/Endpoint.php`](https://github.com/jlevers/selling-partner-api/blob/main/lib/Endpoint.php): (`NA`, `EU`, `FE`, and `NA_SANDBOX`, `EU_SANDBOX`, and `FE_SANDBOX`. See [here](https://github.com/amzn/selling-partner-api-docs/blob/main/guides/en-US/developer-guide/SellingPartnerApiDeveloperGuide.md#selling-partner-api-endpoints) for more details.
* `accessToken (string)`: An access token generated from the refresh token.
* `accessTokenExpiration (int)`: A Unix timestamp corresponding to the time when the `accessToken` expires. If `accessToken` is given, `accessTokenExpiration` is required (and vice versa).
* `$onUpdateCredentials (callable|Closure)`: A callback function to call when a new access token is generated. The function should accept a single argument of type [`SellingPartnerApi\Credentials`](https://github.com/jlevers/selling-partner-api/blob/main/lib/Credentials.php).
* `$roleArn (string)`: If you set up your SP API application with an AWS IAM role ARN instead of a user ARN, pass that ARN here.

### Example

This example assumes you have access to the `Seller Insights` Selling Partner API role, but the general format applies to any Selling Partner API request.


```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use SellingPartnerApi\Api;
use SellingPartnerApi\Configuration;
use SellingPartnerApi\Endpoint;

$config = new Configuration([
    "lwaClientId" => "amzn1.application-oa2-client.....",
    "lwaClientSecret" => "abcd....",
    "lwaRefreshToken" => "Aztr|IwEBI....",
    "awsAccessKeyId" => "AKIA....",
    "awsSecretAccessKey" => "ABCD....",
    "endpoint" => Endpoint::NA
]);

$api = new Api\SellersApi($config);
try {
    $result = $api->getMarketplaceParticipations();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SellersApi->getMarketplaceParticipations: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Endpoints

All endpoint URIs are relative to the `SPAPI_ENDPOINT` value you specify in your `.env` file (the default is https://sellingpartnerapi-na.amazon.com). For instance, the `SellersApi::getMarketplaceParticipations()` endpoint, `/sellers/v1/marketplaceParticipations`, is expanded to `https://sellingpartnerapi-na.amazon.com/sellers/v1/marketplaceParticipations`.

The [`docs/Api/`](https://github.com/jlevers/selling-partner-api/tree/main/docs/Api) directory contains the documentation for interacting each distinct section of the Selling Partner API. Those sections are referred to as **APIs** throughout the documentation---you can think of the Selling Partner API as having many sub-APIs, where each sub-API has a number of endpoints that provide closely related functionality.

Endpoint methods that perform `POST`, `PUT`, and `DELETE` requests typically take some model as a parameter, and nearly all endpoint methods return a model with result information. For instance, [`ShippingApi::createShipment()`](https://github.com/jlevers/selling-partner-api/blob/main/docs/Api/ShippingApi.md#createShipment) takes an instance of the [`CreateShipmentRequest`](https://github.com/jlevers/selling-partner-api/blob/main/docs/Model/Shipping/CreateShipmentRequest.md) model as its only argument, and returns an instance of the [`CreateShipmentResponse`](https://github.com/jlevers/selling-partner-api/blob/main/docs/Model/Shipping/CreateShipmentResponse.md) model.

See the `Models` section below for more information about models.

## Models

Each endpoint has one or more models associated with it. These models are classes that contain the data needed to make a certain kind of request to the API, or contain the data returned by a given request type. All of the models share the same general interface: you can either specify all the model's attributes during initialization, or use setter methods to set each attribute after the fact. Here's an example using the Service API's `Buyer` model ([docs](https://github.com/jlevers/selling-partner-api/blob/main/docs/Model/Service/Buyer.md), ([source](https://github.com/jlevers/selling-partner-api/blob/main/lib/Model/Service/Buyer.php)).

The `Buyer` model has four attributes: `buyer_id`, `name`, `phone`, and `is_prime_member`. (If you're wondering how you would figure out which attributes the model has on your own, check out the `docs` link above.) To create an instance of the `Buyer` model with all those attributes set:

```php
$buyer = new SellingPartnerApi\Model\Service\Buyer([
    "buyer_id" => "ABCDEFGHIJKLMNOPQRSTU0123456",
    "name" => "Jane Doe",
    "phone" => "+12345678901",
    "is_prime_member" => true
]);
```

Alternatively, you can create an instance of the `Buyer` model and then populate its fields:

``` php
$buyer = new SellingPartnerApi\Model\Service\Buyer();
$buyer->setBuyerId("ABCDEFGHIJKLMNOPQRSTU0123456");
$buyer->setName("Jane Doe");
$buyer->setPhone("+12345678901");
$buyer->setIsPrimeMember(true);
```

Each model also has the getter methods you might expect:

``` php
$buyer->getBuyerId();        // -> "ABCDEFGHIJKLMNOPQRSTU0123456"
$buyer->getName();           // -> "Jane Doe"
$buyer->getPhone();          // -> "+12345678901"
$buyer->getIsPrimeMember();  // -> true
```

Models can (and usually do) have other models as attributes:

``` php
$serviceJob = new SellingPartnerApi\Model\Service\Buyer([
    // ...
    "buyer" => $buyer,
    // ...
]);

$serviceJob->getBuyer();             // -> [Buyer instance]
$serviceJob->getBuyer()->getName();  // -> "Jane Doe"
```

## Uploading and downloading documents

The Feeds and Reports APIs include operations that involve uploading and downloading documents to and from Amazon. Amazon encrypts all documents they generate, and requires that all uploaded documents be encrypted. The `SellingPartnerApi\Document` class handles all the encryption/decryption, given an instance of one of the `Model\Reports\ReportDocument`, `Model\Feeds\FeedDocument`, or `Model\Feeds\CreateFeedDocumentResponse` classes. Instances of those classes are in the response returned by Amazon when you make a call to the [`getReportDocument`](https://github.com/jlevers/selling-partner-api/blob/main/docs/Api/ReportsApi.md#getReportDocument), [`getFeedDocument`](https://github.com/jlevers/selling-partner-api/blob/main/docs/Api/FeedsApi.md#getFeedDocument), and [`createFeedDocument`](https://github.com/jlevers/selling-partner-api/blob/main/docs/Api/FeedsApi.md#createFeedDocument) endpoints, respectively.

### Downloading a report document

``` php
use SellingPartnerApi\Api\ReportsApi;

// Assume we've already fetched a report document ID, and that a $config object was defined above
$documentId = "foo.1234";
$reportsApi = new ReportsApi($config);
$reportDocumentInfo = $reportsApi->getReportDocument($documentId);

// Pass the content type of the report you're fetching
$docToDownload = new SellingPartnerApi\Document($reportDocumentInfo->getPayload(), "text/tab-separated-values");
$contents = $docToDownload->download();  // The raw report text
// A SimpleXML object if the content type is text/xml, or an array of associative arrays, each
// sub array corresponding to a row of the report
$data = $docToDownload->getData();
// ... do something with report contents
```

### Uploading a feed document

``` php
use SellingPartnerApi\Api\FeedsApi;
use SellingPartnerApi\Model\Feeds;

const CONTENT_TYPE = "text/xml";  // This will be different depending on your feed type
$feedsApi = new FeedsApi($config);
$createFeedDocSpec = new Feeds\CreateFeedDocumentSpecification(["content_type" => CONTENT_TYPE]);
$feedDocumentInfo = $feedsApi->createFeedDocument($createFeedDocSpec);

$documentContents = file_get_contents("<your/feed/file.xml>");

$docToUpload = new SellingPartnerApi\Document($feedDocumentInfo->getPayload(), CONTENT_TYPE);
$docToUpload->upload($documentContents);
```
