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
        $transport = Transport::all();
        return view('dashboard.index')
                        ->with('title', 'Dashboard')
                        ->with('transport', $transport);
    }

}
