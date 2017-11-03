<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transport;
use Carbon\Carbon;

class TransportController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $actions = [
            ['href' => route('transports.create'), 'title' => 'Adauga Transport'],
        ];
        $transports = Transport::all();
        return view('transports.index')
                        ->with('title', 'Transport')
                        ->with('actions', $actions)
                        ->with('transports', $transports);
    }

    public function create(Request $request) {
        return view('transports.create')
                        ->with('title', 'Adauga Transport');
    }

    public function store(Request $request) {
        return \DB::transaction(function () use ($request) {
                    Transport::create(array_merge($request->only('firma', 'adresa_plecare', 'adresa_destinatie', 'km', 'dislocare_km', 'timp', 'kg', 'suma'), [
                        'data_plecare' => Carbon::parse($request->input('data_plecare'))->format('Y-m-d'),
                                    ]
                    ));
                    return redirect(route('transports.index'));
                }, 5);
    }

}
