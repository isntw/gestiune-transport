<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Transport;

class Company extends Model {

    use SoftDeletes;

    protected $fillable = [
        'name',
        'cui',
        'note',
    ];
    protected $dates = [
        'created_at',
        'udpated_at',
        'deleted_at',
    ];

}
