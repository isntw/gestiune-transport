<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class RaportController extends Controller {

    public function feedOptions(Request $request) {
        $data = [];

        if ($request->input('option') == 'transports') {
            $data = $this->getCompany();
        } elseif ($request->input('option') == 'costs') {
            $data = $this->getCategory();
        }

        return response()->json([
                    'data' => $data,
        ]);
    }

    public function getCompany() {
        $companies = Company::orderBy('name', 'desc')->get();
        $data = [];

        foreach ($companies as $company) {
            $data[] = ['id' => $company->id, 'name' => $company->name];
        }
        return $data;
    }

    public function getCategory() {
        $costCategory = \App\CostCategory::all();
        $data = [];

        foreach ($costCategory as $category) {
            $data[] = ['id' => $category->id, 'name' => $category->name];
        }
        return $data;
    }

}
