<?php

namespace App\Http\Controllers;

use App\Models\Girl;
use App\Models\Category;
use App\Models\Order;
use App\Models\TextCreate;
use App\Models\TimePrice;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

  public function welcome()
  {

    return view('frontend.welcome');
  }
  public function index()
  {

    $girls = Girl::paginate(20);
    $countries = Category::latest()->get();
    $texts = TextCreate::latest()->get();
    $orders = Order::where('state', 'Accept')->get();


    foreach ($girls as $girl) {
      $girl->accepted_orders = $orders->where('girl_id', $girl->id);
    }
    return view('frontend.index', compact('countries', 'girls', 'orders', 'texts'));
  }

  public function search(Request $request)
  {
    $query = $request->input('query');
    $girls = Girl::where('status', 'on')
      ->where('name', 'like', '%' . $query . '%')
      ->get();
    $countries = Category::latest()->get();
    $orders = Order::where('state', 'Accept')->get();

    foreach ($girls as $girl) {
      $girl->accepted_orders = $orders->where('girl_id', $girl->id);
    }
    return view('frontend.index', compact('girls', 'countries', 'orders'));
    // return response()->json($girls);
  }

  // public function priceFilter(Request $request)
  // {
  //   $girls = Girl::latest()->get();
  //   $times = TimePrice::latest()->get();

  //   return view('frontend.index', compact('girls', 'times'));
  // }
}
