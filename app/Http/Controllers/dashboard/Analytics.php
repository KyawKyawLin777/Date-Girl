<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\ReportCommission;
use Carbon\Carbon;

class Analytics extends Controller
{
  public function index()
  {
    $currentYear = Carbon::now()->year;
    $monthlySales = Report::selectRaw('MONTH(created_at) as month, SUM(price) as total')
      ->whereYear('created_at', $currentYear)
      ->groupBy('month')
      ->pluck('total', 'month')
      ->toArray();

    // Ensure all months are represented
    $salesData = array_fill(1, 12, 0);
    foreach ($monthlySales as $month => $total) {
      $salesData[$month] = (int) $total;
    }

    return view('content.dashboard.dashboards-analytics', compact('salesData'));
  }
}
