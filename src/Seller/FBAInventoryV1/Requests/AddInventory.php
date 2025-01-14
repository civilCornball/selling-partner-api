<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: SellingPartnerApi\Generator\Generators\RequestGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInventoryV1\Requests;

use Exception;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FBAInventoryV1\Dto\AddInventoryRequest;
use SellingPartnerApi\Seller\FBAInventoryV1\Responses\AddInventoryResponse;

/**
 * addInventory
 */
class AddInventory extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  AddInventoryRequest  $addInventoryRequest  The object with the list of Inventory to be added
     * @param  string  $xAmznIdempotencyToken  A unique token/requestId provided with each call to ensure idempotency.
     */
    public function __construct(
        public AddInventoryRequest $addInventoryRequest,
        protected string $xAmznIdempotencyToken,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/fba/inventory/v1/items/inventory';
    }

    public function createDtoFromResponse(Response $response): AddInventoryResponse
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200, 400, 403, 404, 429, 500, 503 => AddInventoryResponse::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }

    public function defaultBody(): array
    {
        return $this->addInventoryRequest->toArray();
    }

    public function defaultHeaders(): array
    {
        return array_filter(['x-amzn-idempotency-token' => $this->xAmznIdempotencyToken]);
    }
}
