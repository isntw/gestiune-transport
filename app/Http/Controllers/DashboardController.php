<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Transport;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        $lastMonth = $this->getLastMonthsDetails(1);
        return view('dashboard.index')
            ->with('title', 'Dashboard')
            ->with('last7Month', $this->getLastMonthsDetails(7))
            ->with('lastMonth', $lastMonth);
    }

    public function getLastMonthsDetails($nrOfMonths) {
        $start = strtotime("-$nrOfMonths month");
        $date = date('Y-m-d', $start);
        $transport = Transport::all()
            ->where('data_plecare', '>', $date);
        return $transport;
    }


}
