<?php

declare(strict_types=1);

namespace App\Response;

class BaseResponse
{
    public bool $ok = true;
    public ?string $errorMessage = null;
}

