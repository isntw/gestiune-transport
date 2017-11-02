<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Transport;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $end_month = \Carbon\Carbon::now()->addMonth()->endOfMonth();
        $lastMonths = 12;
        $start_month = $end_month->copy()->subMonth($lastMonths)->startOfMonth();
        $allTransports = Transport::whereBetween('data_plecare', [$start_month, $end_month])->orderBy('data_plecare')->get();
        $allCosts = Cost::whereBetween('pay_date', [$start_month, $end_month])->orderBy('pay_date')->get();
        $results = [];
        for ($month = $start_month; $month->diffInMonths($end_month) > 0; $month->addMonth()) {
            $results[$month->copy()->format('Y-m')] = [
                'venituri' => $this->computeIncome($allTransports, $month, 'incasare'),
                'cheltuieli' => $this->computeCosts($allCosts, $month, 'suma'),
            ];
        }


        $transportsInfo = \DB::table('transports')
            ->whereBetween('data_plecare', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])
            ->selectRaw('sum(incasare) as incasare, sum(km) as km')
            ->first();

        $costsInfo = \DB::table('costs')
            ->whereBetween('pay_date', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfMonth()])->get();

        return view('dashboard.index')
            ->with('title', 'Dashboard')
            ->with('results', $results)
            ->with('costInfo', $this->getCosts($costsInfo))
            ->with('transportsInfo', $transportsInfo);
    }

    public function computeIncome($allTransports, $month, $computeField) {
        $sum = 0;
        foreach ($allTransports as $transport) {
            if ($transport->data_plecare->format('Y-m') == $month->format('Y-m')) {
                $sum += $transport->$computeField;
            }
        }
        return $sum;
    }

    public function computeCosts($allCosts, $month, $computeField) {
        $sum = 0;
        foreach ($allCosts as $costs) {
            if ($costs->pay_date->format('Y-m') == $month->format('Y-m')) {
                $sum += $costs->$computeField;
            }
        }
        return $sum;
    }

    public function getCosts($costsInfo) {
        $suma = [
            'Motorina' => 0,
            'Consumabile' => 0,
            'Piese' => 0,
            'Manopera' => 0,
            'TAXE' => 0,
            'Altele' => 0,
        ];
        foreach ($costsInfo as $costInfo) {
            switch ($costInfo->category_id) {
                case 1:
                    $suma['Motorina'] += $costInfo->suma;
                    break;
                case 2:
                    $suma['Consumabile'] += $costInfo->suma;
                    break;
                case 3:
                    $suma['Piese'] += $costInfo->suma;
                    break;
                case 4:
                    $suma['Manopera'] += $costInfo->suma;
                    break;
                case 5:
                    $suma['TAXE'] += $costInfo->suma;
                    break;
                case 6:
                    $suma['Altele'] += $costInfo->suma;
                    break;
            }
        }
        return $suma;
    }
}
