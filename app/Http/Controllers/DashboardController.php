<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Transport;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller {

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
                'venituri' => $this->computeIncome($allTransports, $month),
                'cheltuieli' => $this->computeCosts($allCosts, $month),
            ];
        }

        return view('dashboard.index')
                        ->with('title', 'Dashboard')
                        ->with('results', $results);
    }

    public function computeIncome($allTransports, $month) {
        $sum = 0;
        foreach ($allTransports as $transport) {
            if ($transport->data_plecare->format('Y-m') == $month->format('Y-m')) {
                $sum += $transport->suma;
            }
        }
        return $sum;
    }

    public function computeCosts($allCosts, $month) {
        $sum = 0;
        foreach ($allCosts as $costs) {
            if ($costs->pay_date->format('Y-m') == $month->format('Y-m')) {
                $sum += $costs->suma;
            }
        }
        return $sum;
    }

}
