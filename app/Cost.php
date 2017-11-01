<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CostCategory;

class Cost extends Model {

    protected $fillable = [
        'category_id',
        'pay_date',
        'suma',
        'detalii',
    ];

    public function costCategory() {
        return $this->hasOne(CostCategory::class, 'id', 'category_id');
    }

}
