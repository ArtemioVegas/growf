<?php

declare(strict_types=1);

namespace App\Response;

class CreateOrderResponse extends BaseResponse
{
    public int $orderId;

    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }
}
