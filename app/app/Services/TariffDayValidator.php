<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\ValidationException;
use App\Models\DeliveryDay;

class TariffDayValidator
{
    public function validate(int $tariffId, int $dayNumber)
    {
        if (false === DeliveryDay::isExistDayForTarif($tariffId, $dayNumber)) {
            throw new ValidationException("Выбранный день $dayNumber не найден для тарифа $tariffId");
        }
    }
}

