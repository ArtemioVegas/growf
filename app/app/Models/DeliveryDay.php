<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int tarif_id
 * @property int day
 */
class DeliveryDay extends Model
{
    /**
     * @var string
     */
    protected $table = 'delivery_days';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['tarif_id', 'day'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    public static function isExistDayForTarif(int $tarifId, int $dayNumber): bool
    {
        return self::query()
            ->where('delivery_days.day', '=', $dayNumber)
            ->whereRaw('delivery_days.day = ? AND delivery_days.tarif_id = ?', [$dayNumber, $tarifId])
            ->limit(1)
            ->exists()
        ;
    }
}
