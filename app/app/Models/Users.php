<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string phone
 */
class Users extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'address'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    public static function getOrCreate(string $name, string $phone) : self
    {
        $user = static::getUserFromDb($phone);

        if (null === $user) {
            $user = new self();
            $user->phone = $phone;
        }

        $user->name = $name;

        $user->saveOrFail();

        return $user;
    }

    public static function getUserFromDb(string $phone): ?self
    {
        return Users::where('phone', $phone)->first();
    }
}
