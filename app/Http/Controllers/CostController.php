<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostCategory;
use Illuminate\Http\Request;

class CostController extends Controller
{

    public function index() {
        $actions = [
            ['href' => route('costs.create'), 'title' => 'Adauga Cheltuiala'],
        ];
        $costs = Cost::with('costCategory')->get();
        return view('costs.index')
            ->with('title', 'Cheltuieli')
            ->with('costs', $costs)
            ->with('costs', $costs)
            ->with('actions', $actions);
    }

}
