<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutoCompleteController extends Controller {

    public function autoComplete(Request $request) {
        $query = $request->get('term', '');

        $companies = \App\Company::where('name', 'LIKE', '%' . $query . '%')->get();
        $data = array();
        foreach ($companies as $company) {
            $data[] = ['value' => $company->name, 'id' => $company->id];
        }
        if (count($data))
            return $data;
        else
            return ['value' => 'Nici un rezultat gasit.', 'id' => ''];
    }

}
