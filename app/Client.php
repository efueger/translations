<?php

namespace App;

use App\Traits\HasParentModel;
use Bu4ak\Roles\Enum\RoleType;

class Client extends User
{
    use HasParentModel;

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('role_id', RoleType::USER);
        });
    }
}
