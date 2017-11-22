<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model {

    protected $fillable = [
        'firma_id',
        'adresa_plecare',
        'adresa_destinatie',
        'km',
        'dislocare_km',
        'data_plecare',
        'timp',
        'kg',
        'suma',
        'is_payed',
    ];
    protected $dates = [
        'data_plecare',
        'created_at',
        'udpated_at',
    ];

    public function company() {
        return $this->hasOne(Company::class, 'id', 'firma_id');
    }

}
