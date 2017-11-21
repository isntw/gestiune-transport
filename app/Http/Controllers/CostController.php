<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\Costs\StoreCostRequest;
use App\Http\Requests\Costs\UpdateCostRequest;

class CostController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $actions = [
            ['href' => route('costs.create'), 'title' => 'Adauga Cheltuiala'],
        ];
        $costs = Cost::with('costCategory')->orderBy('created_at', 'desc')->get();
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

    public function store(StoreCostRequest $request) {
        return \DB::transaction(function () use ($request) {
                    $pay_date = Carbon::createFromFormat('d/m/Y', $request->input('pay_date'))->toDateTimeString();
                    Cost::create(array_merge($request->only('category_id', 'detalii', 'suma'), [
                        'pay_date' => $pay_date,
                    ]));
                    \Toastr::success('Cheltuiala a fost creata cu succes');
                    return redirect(route('costs.index'));
                }, 5);
    }

    public function show() {
        
    }

    public function edit(Cost $cost) {
        return view('costs.edit')
                        ->with('cost', $cost);
    }

    public function update(UpdateCostRequest $request, Cost $cost) {
        return \DB::transaction(function () use ($request, $transport) {
                    $pay_date = Carbon::createFromFormat('d/m/Y', $request->input('pay_date'))->toDateTimeString();

                    $cost->update(array_merge($request->only('category_id', 'detalii', 'suma', 'pay_date'), [
                        'pay_date' => $pay_date,
                    ]));
                    \Toastr::success('Cheltuiala a fost modificata cu succes');
                    return redirect()->route('transports.index');
                }, 5);
    }

    public function destroy(Request $request, Cost $cost) {
        $cost->delete();
        \Toastr::success('Cheltuiala a fost stearsa cu succes');
        return redirect()->back();
    }

}
