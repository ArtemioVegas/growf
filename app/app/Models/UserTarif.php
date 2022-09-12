<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property int tarif_id
 * @property int start_day
 * @property string address
 */
class UserTarif extends Model
{
    /**
     * @var string
     */
    protected $table = 'users_tarifs';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'tarif_id', 'start_day', 'address'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    public static function create(array $attributes) : self
    {
        $tarif = new self();
        $tarif->fill($attributes);
        $tarif->saveOrFail();

        return $tarif;
    }
}
