<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Tarif;
use App\Models\Users;
use App\Models\UserTarif;
use Illuminate\Support\Facades\DB;

class OrderService
{
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;
    const SUNDAY = 7;

    const DAYS_MAP = [
        self::MONDAY => 'Понедельник',
        self::TUESDAY => 'Вторник',
        self::WEDNESDAY => 'Среда',
        self::THURSDAY => 'Четверг',
        self::FRIDAY => 'Пятница',
        self::SATURDAY => 'Суббота',
        self::SUNDAY => 'Воскресение',
    ];

    private TariffDayValidator $tariffDayValidator;

    public function __construct(TariffDayValidator $tariffDayValidator)
    {
        $this->tariffDayValidator = $tariffDayValidator;
    }

    public function getTarifs(int $countItems)
    {
        return Tarif::getAllTarifsPaginated($countItems);
    }

    /**
     * @param array $requestData
     * @return int
     * @throws \Exception
     */
    public function saveOrder(array $requestData): int
    {
        $this->validate($requestData['tarif'], $requestData['delivery_day']);
        try {
            DB::beginTransaction();

            $user = Users::getOrCreate($requestData['name'], $requestData['phone']);
            $userTarif = UserTarif::create(
                [
                    'user_id' => $user->getAttribute('id'),
                    'tarif_id' => $requestData['tarif'],
                    'start_day' => $requestData['delivery_day'],
                    'address' => $requestData['address'],
                ]
            );

            DB::commit();
            return $userTarif->getAttribute('id');
        } catch(\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    private function validate(int $tarifId, int $dayNumber)
    {
        $this->tariffDayValidator->validate($tarifId, $dayNumber);
    }
}
