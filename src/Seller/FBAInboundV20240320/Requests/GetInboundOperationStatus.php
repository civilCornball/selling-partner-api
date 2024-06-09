<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInboundV20240320\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\ErrorList;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\InboundOperationStatus;

/**
 * getInboundOperationStatus
 */
class GetInboundOperationStatus extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  string  $operationId  Identifier of an asynchronous operation.
     */
    public function __construct(
        protected string $operationId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/inbound/fba/2024-03-20/operations/{$this->operationId}";
    }

    public function createDtoFromResponse(Response $response): InboundOperationStatus|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200 => InboundOperationStatus::class,
            400, 404, 500, 403, 413, 415, 429, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }
}
