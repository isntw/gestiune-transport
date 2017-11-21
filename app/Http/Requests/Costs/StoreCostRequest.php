<?php

namespace App\Http\Requests\Costs;

use Illuminate\Foundation\Http\FormRequest;

class StoreCostRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'category_id' => 'required|exists:cost_categories,id',
            'pay_date' => "required|date_format:d/m/Y|before:tomorrow",
            'suma' => 'required|numeric',
            'detalii' => 'max:4096',
        ];
    }

}
