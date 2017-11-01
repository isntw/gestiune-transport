<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model {

    protected $fillable = [
        'adresa_plecare',
        'adresa_destinatie',
        'data_plecare',
        'data_destinatie',
        'firma',
        'km',
        'incasare',
    ];
    protected $dates = [
        'data_plecare',
        'data_destinatie',
        'created_at',
        'udpated_at',
    ];

}
