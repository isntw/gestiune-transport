<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model {

    protected $fillable = [
        'firma',
        'adresa_plecare',
        'adresa_destinatie',
        'km',
        'dislocare_km',
        'data_plecare',
        'timp',
        'kg',
        'suma',
    ];
    protected $dates = [
        'data_plecare',
        'created_at',
        'udpated_at',
    ];

}
