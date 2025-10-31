<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Settings extends Model
{
    //elequent: object relation mapping
    // query builder:
    // select * from setting
    // insert into settings(app_name, phone _number,addres) values()
    protected $table = [
        'app_name',
        'phone_number',
        'addres'
=======
// Eloquent: Object Relation Mapping

class Settings extends Model
{
    // protected $table = "setting";

    protected $fillable = [
        'app_name',
        'address',
        'phone_number',
>>>>>>> 9f193ae5c5da1dd26eec2444224fb402a6caba64
    ];
}
