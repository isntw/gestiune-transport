<?php

namespace App\Http\Requests\Transports;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransportRequest extends FormRequest {

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
            'firma' => 'required|max:128',
            'adresa_plecare' => 'required|max:256',
            'adresa_destinatie' => 'required|max:256',
            'km' => 'required|numeric',
            'dislocare_km' => 'required|numeric',
            'data_plecare' => "required|date_format:d/m/Y|before:tomorrow",
            'timp' => 'required|numeric',
            'kg' => 'required|numeric',
            'suma' => 'required|numeric',
        ];
    }

}
