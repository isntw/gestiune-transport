<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostCategory;
use Illuminate\Http\Request;

class CostController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $actions = [
            ['href' => route('costs.create'), 'title' => 'Adauga Cheltuiala'],
        ];
        $costs = Cost::with('costCategory')->get();
        return view('costs.index')
                        ->with('title', 'Cheltuieli')
                        ->with('costs', $costs)
                        ->with('actions', $actions);
    }

    public function create(Request $request) {
        $costs = CostCategory::all();

        return view('costs.create')
                        ->with('costs', $costs)
                        ->with('title', 'Adauga Cheltuiala');
    }

    public function store(Request $request) {
        return \DB::transaction(function () use ($request) {

                    Cost::create($request->all());
                    return redirect(route('costs.index'));
                }, 5);
    }

}
