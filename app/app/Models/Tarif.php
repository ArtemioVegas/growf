<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property int price
 */
class Tarif extends Model
{
    /**
     * @var string
     */
    protected $table = 'tarifs';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'price'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    public static function getAllTarifsPaginated(int $countItems)
    {
        return Tarif::with('deliveryDays')->simplePaginate($countItems);
    }

    public function deliveryDays()
    {
        return $this->hasMany(DeliveryDay::class);
    }
}
