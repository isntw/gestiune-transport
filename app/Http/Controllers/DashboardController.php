<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Transport;

class DashboardController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $dates = $this->getLastMonthsDetails(12);
        $result = [];
        foreach ($dates as $date) {
            $key = $date->data_plecare->format('Y-m');
            !isset($result[$key]) ? $result[$key] = $date->incasare : $result[$key] += $date->incasare;
        }
        
        return view('dashboard.index')
                        ->with('title', 'Dashboard')
                        ->with('lastMonths', $result)
                        ->with('lastMonth', $this->getLastMonthsDetails(1));
    }

    public function getLastMonthsDetails($nrOfMonths) {
        $start = strtotime("-$nrOfMonths month");
        $date = date('Y-m-d', $start);
        $transport = Transport::all()
                ->where('data_plecare', '>', $date);
        return $transport;
    }

}
