<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Eloquent: Object Relation Mapping

class Settings extends Model
{
    // protected $table = "setting";

    protected $fillable = [
        'app_name',
        'address',
        'phone_number',
    ];
}
