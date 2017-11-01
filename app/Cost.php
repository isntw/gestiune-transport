<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CostCategory;

class Cost extends Model
{

    protected $fillable = [
        'category_id',
        'suma',
        'detalii',
    ];
    protected $dates = [
        'pay_date',
        'created_at',
        'udpated_at',
    ];

    public function costCategory() {
        return $this->hasOne(CostCategory::class, 'id', 'category_id');
    }

}
