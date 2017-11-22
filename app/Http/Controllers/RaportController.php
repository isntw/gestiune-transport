<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use \App\Transport;

class RaportController extends Controller {

    public function index() {
        return view('raports.index')
                        ->with('title', 'Rapoarte');
    }

    public function show(Request $request) {
        $start_date = Carbon::createFromFormat('d-m-Y', $request->input('start_date'))->startOfDay();
        $end_date = Carbon::createFromFormat('d-m-Y', $request->input('end_date'))->endOfDay();

        if ($request->input('radio') == 'transports') {
            if (!$request->input('check')) {
                $request->input('is_payed') ? $transports = Transport::whereBetween('data_plecare', [$start_date, $end_date])->whereIn('is_payed', [TRUE])->get() :
                                $transports = Transport::whereBetween('data_plecare', [$start_date, $end_date])->get();
            } else {
                $request->input('is_payed') ? $transports = Transport::whereBetween('data_plecare', [$start_date, $end_date])->whereIn('firma_id', [$request->input('value')])->whereIn('is_payed', [TRUE])->get() :
                                $transports = Transport::whereBetween('data_plecare', [$start_date, $end_date])->whereIn('firma_id', [$request->input('value')])->get();
            }
            return view('raports.transportsRaport')
                            ->with('transports', $transports)
                            ->with('title', 'Transporturi');
        } else if ($request->input('radio') == 'costs') {
            if (!$request->input('check')) {
                $costs = \App\Cost::whereBetween('pay_date', [$start_date, $end_date])
                        ->get();
            } else {
                $costs = \App\Cost::whereBetween('pay_date', [$start_date, $end_date])
                        ->whereIn('category_id', [$request->input('value')])
                        ->get();
            }
            return view('raports.costsRaport')
                            ->with('costs', $costs)
                            ->with('title', 'Costuri');
        }
    }

}
