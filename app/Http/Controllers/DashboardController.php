<?php

namespace App\Http\Controllers;

use App\Cost;
use App\User;
use Illuminate\Http\Request;
use App\Transport;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $dates = $this->getLastMonthsDetails(12);
        $costs = $this->getCosts(12);

        $result = [];
        foreach ($dates as $date) {
            $key = $date->data_plecare->format('Y-m');
            !isset($result[$key]['venituri']) ? $result[$key]['venituri'] = $date->incasare : $result[$key]['venituri'] += $date->incasare;
        }
        foreach ($costs as $cost) {
            $key = $cost->pay_date->format('Y-m');
            !isset($result[$key]['cheltuieli']) ? $result[$key]['cheltuieli'] = $cost->suma : $result[$key]['cheltuieli'] += $cost->suma;
        }
        return view('dashboard.index')
            ->with('title', 'Dashboard')
            ->with('result', $result)
            ->with('lastMonth', $this->getLastMonthsDetails(1));
    }

    public function getLastMonthsDetails($nrOfMonths) {
        $start = strtotime("-$nrOfMonths month");
        $date = date('Y-m-d', $start);
        $transport = Transport::all()
            ->where('data_plecare', '>', $date);
        return $transport;
    }

    public function getCosts($nrOfMonths) {
        $start = strtotime("-$nrOfMonths month");
        $date = date('Y-m-d', $start);
        $costs = Cost::all()
            ->where('pay_date', '>', $date);
        return $costs;
    }

}
