<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Transport;
use App\Cost;

class RaportController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('raports.index')
                        ->with('title', 'Rapoarte');
    }

    public function show(Request $request) {
        $start_date = Carbon::createFromFormat('d-m-Y', $request->input('start_date'))->startOfDay();
        $end_date = Carbon::createFromFormat('d-m-Y', $request->input('end_date'))->endOfDay();
        $transports = Transport::whereBetween('data_plecare', [$start_date, $end_date]);
        $costs = Cost::whereBetween('pay_date', [$start_date, $end_date]);
        if ($request->input('radio') == TRANSPORTS) {
            if (!$request->input('check')) {
                $transports = $request->input('is_payed') ? $transports->whereIn('is_payed', [TRUE])->get() :
                        $transports->get();
            } else {
                $transports = $request->input('is_payed') ? Transport::whereBetween('data_plecare', [$start_date, $end_date])
                                ->whereIn('firma_id', [$request->input('value')])->whereIn('is_payed', [TRUE])->get() :
                        Transport::whereBetween('data_plecare', [$start_date, $end_date])->whereIn('firma_id', [$request->input('value')])->get();
            }
            return view('raports.transportsRaport')->with('transports', $transports)->with('title', 'Raport Transporturi');
        } else if ($request->input('radio') == COSTS) {
            $costs = !$request->input('check') ? $costs->get() : $costs->whereIn('category_id', [$request->input('value')])->get();
            return view('raports.costsRaport')->with('costs', $costs)->with('title', 'Raport Costuri');
        }
    }

}
