<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transport;

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
//        array_merge($request->only('adresa_plecare', 'adresa_destinatie', 'firma', 'km', 'incasare'),['ad'=>'asd'])
        Transport::create($request->all());
    }

}
