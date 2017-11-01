<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostController extends Controller {

    public function index() {
        $actions = [
            ['href' => route('costs.create'), 'title' => 'Adauga Cheltuiala'],
        ];
        return view('costs.index')
                        ->with('title', 'Cheltuieli')
                        ->with('actions', $actions);
    }

}
