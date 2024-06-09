<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\ListingsItemsV20210801\Dto;

use SellingPartnerApi\Dto;

final class ItemImage extends Dto
{
    /**
     * @param  string  $link  The link, or URL, to the image.
     * @param  int  $height  The height of the image in pixels.
     * @param  int  $width  The width of the image in pixels.
     */
    public function __construct(
        public readonly string $link,
        public readonly int $height,
        public readonly int $width,
    ) {
    }
}
