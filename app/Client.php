<?php

namespace App;

use App\Traits\HasParentModel;
use Bu4ak\Roles\Enum\RoleType;

/**
 * Class Client
 * @package App
 */
class Client extends User
{
    use HasParentModel;

    /**
     * add global scope
     */
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('role_id', RoleType::USER);
        });
    }
}
