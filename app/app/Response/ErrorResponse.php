<?php

declare(strict_types=1);

namespace App\Response;

class ErrorResponse extends BaseResponse
{
    public function __construct(string $errorMessage)
    {
        $this->errorMessage = $errorMessage;
        $this->ok = false;
    }
}
