<?php

namespace App\Http\Controllers;

use App\Models\Girl;
use App\Models\Order;
use App\Models\Report;
use App\Models\ReportCommission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
  // Status Change and seve report
  public function stateChange($id)
  {
    $order = Order::where('id', $id)
      ->latest()
      ->first();
    $order->state = 'Accept';
    $order->update();
    $report = new Report();
    $report->girl_id = $order->girl_id;
    $report->order_id = $order->id;
    $report->customer_name = $order->customer_name;
    $report->phone_number = $order->phone_number;
    $report->girl_name = $order->girl_name;
    $report->country = $order->country;
    $report->price = $order->price;
    $report->time = $order->time;
    $report->day_night = $order->day_night;
    $report->state = $order->state;
    $report->order_date = $order->created_at;
    $report->save();

    return redirect()
      ->back()
      ->with('success', 'Order Confirmed!');
  }

  // report list
  public function reportList(Request $request)
  {
    // dd($request);
    $today = Carbon::today();
    $reports = Report::whereDate('created_at', $today)->latest()->get();
    $totalPrice = Report::whereDate('created_at', $today)->sum('price');

    return view('report.list', compact('reports', 'totalPrice'));
  }

  public function nameSearch(Request $request)
  {
    $query = Report::query();

    // Check if a search term is provided
    if ($request->has('search') && $request->search != '') {
      $search = $request->search;
      $query->where('girl_name', 'like', '%' . $search . '%');
    }

    // Check if date range is provided
    if ($request->has('start_date') && $request->start_date != '') {
      $startDate = $request->start_date;
      $query->whereDate('order_date', '>=', $startDate);
    }
    if ($request->has('end_date') && $request->end_date != '') {
      $endDate = $request->end_date;
      $query->whereDate('order_date', '<=', $endDate);
    }

    $reports = $query->latest()->get();

    // Calculate the total price for the filtered reports
    $totalPrice = $reports->sum('price');

    return view('report.list', compact('reports', 'totalPrice'));
  }
}
