<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transport;
use App\Cost;
use App\CostCategory;
use Carbon\Carbon;

class DashboardStatisticsController extends Controller {

    public function statistics(Request $request) {
        $start_date = Carbon::createFromFormat('m-Y', $request->input('month'))->startOfMonth();
        $end_date = $start_date->copy()->endOfMonth();
        $total = $this->initArray();
        $transports = Transport::whereBetween('data_plecare', [$start_date, $end_date])->orderBy('data_plecare')->get();
        $costs = Cost::with('costCategory')
                ->whereBetween('pay_date', [$start_date, $end_date])
                ->orderBy('pay_date')
                ->get();
        foreach ($transports as $transport) {
            $total['total_km'] += $transport->km;
            $total['total_suma'] += $transport->suma;
        }
        foreach ($costs as $cost) {
            $total['total_cheltuieli'] += $cost->suma;
        }
        return response()->json([
                    'cheltuieli' => $this->getCosts($costs),
                    'total' => $total,
        ]);
    }

    public function initArray() {
        $data = [];
        $data['total_km'] = 0;
        $data['total_suma'] = 0;
        $data['total_cheltuieli'] = 0;
        return $data;
    }

    public function computeSuma($costs, $current) {
        $suma = 0;
        foreach ($costs as $cost) {
            if ($cost->category_id == $current->id)
                $suma += $cost->suma;
        }
        return $suma;
    }

    public function getCosts($costs) {
        $data = [];

        foreach (CostCategory::all() as $category) {
            $data[] = ['label' => $category->name, 'value' => $this->computeSuma($costs, $category)];
        }
        return $data;
    }

}
