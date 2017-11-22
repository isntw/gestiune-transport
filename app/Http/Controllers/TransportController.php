<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transport;
use Carbon\Carbon;
use App\Http\Requests\Transports\StoreTransportRequest;
use App\Http\Requests\Transports\UpdateTransportRequest;

class TransportController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        $actions = [
            ['href' => route('transports.create'), 'title' => 'Adauga Transport'],
        ];
        $transports = Transport::orderBy('created_at', 'desc')->get();
        return view('transports.index')
                        ->with('title', 'Transport')
                        ->with('actions', $actions)
                        ->with('transports', $transports);
    }

    public function create(Request $request) {
        return view('transports.create')
                        ->with('title', 'Adauga Transport');
    }

    public function store(StoreTransportRequest $request) {
        return \DB::transaction(function () use ($request) {
                    $data_plecare = Carbon::createFromFormat('d/m/Y', $request->input('data_plecare'))->toDateTimeString();

                    Transport::create(array_merge($request->only('firma_id', 'adresa_plecare', 'adresa_destinatie', 'km', 'dislocare_km', 'timp', 'kg', 'suma'), [
                        'data_plecare' => $data_plecare,
                    ]));
                    \Toastr::success('Transportul a fost creat cu succes');
                    return redirect(route('transports.index'));
                }, 5);
    }

    public function show(Transport $transport) {
        $actions = $transport->is_payed ? [
            ['href' => route('transports.status', $transport->id), 'title' => 'Anuleaza Plata', 'class' => 'btn-danger']
                ] : [
            ['href' => route('transports.status', $transport->id), 'title' => 'Achita Transport']
        ];
        return view('transports.show')
                        ->with('title', 'Trasportul: ' . $transport->adresa_plecare . ' - ' . $transport->adresa_destinatie)
                        ->with('actions', $actions)
                        ->with('transport', $transport);
    }

    public function edit(Transport $transport) {
        return view('transports.edit')
                        ->with('transport', $transport);
    }

    public function update(UpdateTransportRequest $request, Transport $transport) {
        return \DB::transaction(function () use ($request, $transport) {
                    $data_plecare = Carbon::createFromFormat('d/m/Y', $request->input('data_plecare'))->toDateTimeString();

                    $transport->update(array_merge($request->only('id', 'firma_id', 'adresa_plecare', 'adresa_destinatie', 'km', 'dislocare_km', 'data_plecare', 'timp', 'kg', 'suma'), [
                        'data_plecare' => $data_plecare,
                    ]));
                    \Toastr::success('Transportul a fost modificat cu succes');
                    return redirect()->route('transports.index');
                }, 5);
    }

    public function destroy(Request $request, Transport $transport) {
        $transport->delete();
        \Toastr::success('Transportul a fost sters');
        return redirect()->back();
    }

    public function status(Transport $transport) {
        return \DB::transaction(function () use ($transport) {
                    $transport->is_payed ? $transport->update(['is_payed' => false]) : $transport->update(['is_payed' => true]);
                    \Toastr::success('Transportul a fost modificat cu succes');
                    return redirect()->route('transports.show', $transport->id);
                }, 5);
    }

}
