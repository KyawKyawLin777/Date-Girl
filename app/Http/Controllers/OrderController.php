<?php

namespace App\Http\Controllers;

use App\Models\Girl;
use App\Models\Order;
use App\Models\Category;
use App\Models\TimePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
  // Order Page
  public function orderPage($id)
  {
    $girls = Girl::where('id', $id)->first();
    $countries = Category::where('id', $girls->country)->first();
    $countrys = Category::all();
    $times = TimePrice::where('girlid', $girls->id)
      ->latest()
      ->get();
    return view('order.order', compact('girls', 'countries', 'times', 'countrys'));
  }

  // Order Create
  public function orderCreate(Request $request)
  {
    try {
      $this->orderValidationCheck($request);
      $data = $this->requestOrder($request);
      Order::create($data);
      return redirect()
        ->back()
        ->with('success', 'Order Form Is Successful & Please Wait Response From Admin!');
    } catch (\Exception $e) {
      return redirect()
        ->back()
        ->with('error', 'There was an error processing your order: ' . $e->getMessage());
    }
  }

  // Order Reject Stage and delete
  public function orderReject($id)
  {
    $order = Order::find($id);
    $order->delete();
    return redirect()
      ->back()
      ->with('delete', 'Order Form Is Reject And Deleted!');
  }

  // get request data
  private function requestOrder($request)
  {
    return [
      'girl_id' => $request->girl_id,
      'girl_name' => $request->girl_name,
      'country' => $request->country,
      'customer_name' => $request->customer_name,
      'phone_number' => $request->phone_number,
      'price' => $request->price,
    
      'time' => $request->time,
      // 'day_night' => $request->day_night,
      'price' => $request->price,
      'girl_commission' => $request->girl_commission,
    ];
  }

  // order list
  public function orderList()
  {
    $order_lists = Order::latest()->get();
    // dd($order_list);
    return view('order.list', compact('order_lists'));
  }

  // validation check country
  private function orderValidationCheck($request)
  {
    Validator::make($request->all(), [
      'girl_id' => 'required',
      'girl_name' => 'required',
      'country' => 'required',
      'customer_name' => 'required',
      'phone_number' => 'required',
      // 'captcha' => 'required|captcha',
      'time' => 'required|string',
      'price' => 'required',
      'girl_commission' => 'required',
    ])->validate();
  }
}
