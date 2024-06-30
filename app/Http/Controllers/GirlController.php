<?php

namespace App\Http\Controllers;

use App\Models\Girl;
use App\Models\Category;
use App\Models\Order;
use App\Models\TimePrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GirlController extends Controller
{
  // Girl Page
  public function girlPage()
  {
    $girls = Girl::with('category')
      ->latest()
      ->get();
    $countries = Category::latest()->get();
    return view('girl.girl_create', compact('countries', 'girls'));
  }

  public function girlOnOff()
  {
    $girls = Girl::latest()->get();
    $countries = Category::latest()->get();

    return view('girl.girl_on_off', compact('girls', 'countries'));
  }

  public function girlOn(Request $request, $id)
  {
    $girls = Girl::find($id);
    $girls->status = 'on';
    $girls->save();

    return redirect()
      ->back()
      ->with('success', 'Girl ON Successfully!');
  }

  public function girlOff(Request $request, $id)
  {
    $girls = Girl::find($id);
    $girls->status = 'off';
    $girls->save();

    return redirect()
      ->back()
      ->with('success', 'Girl OFF Successfully!');
  }

  //girl store
  public function girlCreate(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'country' => 'required',
      'age' => 'required',
      'height' => 'required',
      'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description_photo_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description_photo_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description_photo_three' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description_photo_four' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description' => 'nullable',
      'type' => 'nullable',
      'get_service' => 'nullable',
      'price' => 'required|array',
      'time' => 'required|array',
      'time.*' => 'required|string',
      'price.*' => 'required|string',
    ]);

    $fileName = uniqid() . $request->file('profile_photo')->getClientOriginalName();
    $request->file('profile_photo')->storeAs('public', $fileName);

    if ($request->hasFile('description_photo_one')) {
      $fileName2 = uniqid() . $request->file('description_photo_one')->getClientOriginalName();
      $request->file('description_photo_one')->storeAs('public', $fileName2);
    }
    if ($request->hasFile('description_photo_two')) {
      $fileName5 = uniqid() . $request->file('description_photo_two')->getClientOriginalName();
      $request->file('description_photo_two')->storeAs('public', $fileName5);
    }
    if ($request->hasFile('description_photo_three')) {
      $fileName6 = uniqid() . $request->file('description_photo_three')->getClientOriginalName();
      $request->file('description_photo_three')->storeAs('public', $fileName6);
    }
    if ($request->hasFile('description_photo_four')) {
      $fileName7 = uniqid() . $request->file('description_photo_four')->getClientOriginalName();
      $request->file('description_photo_four')->storeAs('public', $fileName7);
    }

    if ($request->hasFile('video')) {
      $fileName3 = uniqid() . $request->file('video')->getClientOriginalName();
      $request->file('video')->storeAs('public', $fileName3);
    }

    $count = count($request->time);
    $girl = new Girl();
    $girl->name = $request->name;
    $girl->country = $request->country;
    $girl->profile_photo = $fileName;
    $girl->age = $request->age;
    $girl->height = $request->height;
    $girl->type = $request->type;
    $girl->description = $request->description;
    $girl->girl_commission = $request->girl_commission ?? 50;
    $girl->description_photo_one = $fileName2 ?? null;
    $girl->description_photo_two = $fileName5 ?? null;
    $girl->description_photo_three = $fileName6 ?? null;
    $girl->description_photo_four = $fileName7 ?? null;
    // $girl->price = $request->price;
    // $girl->time = $request->time;
    $girl->video = $fileName3 ?? null;
    $girl->get_service = $request->get_service;

    $girl->save();

    $girl_id = $girl->id;

    for ($i = 0; $i < $count; $i++) {
      $time_price = new TimePrice();
      $time_price->girlid = $girl_id;
      $time_price->price = $request->input('price')[$i];
      $time_price->time = $request->input('time')[$i];
      // $time_price->day_night = $request->input('day_night')[$i];
      $time_price->save();
    }
    return redirect()
      ->back()
      ->with('success', 'Girl created successfully.');
  }

  // Edit Page
  public function girlEdit($id)
  {
    $countries = Category::latest()->get();
    $girl = Girl::where('id', $id)->first();
    $time_price = TimePrice::where('girlid', $id)->get();
    return view('girl.girl_edit', compact('girl', 'countries', 'time_price'));
  }

  // Girl Update
  public function girlUpdate(Request $request, $id)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'country' => 'required',
      'age' => 'required',
      'height' => 'required',
      'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description_photo_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description_photo_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description_photo_three' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description_photo_four' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'description' => 'nullable',
      'type' => 'nullable',
      'get_service' => 'nullable',
      'price' => 'required|array',
      'price.*' => 'required|string',
    ]);

    $girl = Girl::find($id);

    if ($request->hasFile('profile_photo')) {
      if ($girl->profile_photo != null) {
        Storage::delete('public/' . $girl->profile_photo);
      }

      $fileName1 = uniqid() . '_' . $request->file('profile_photo')->getClientOriginalName();
      $request->file('profile_photo')->storeAs('public/', $fileName1);
      $girl->profile_photo = $fileName1;
    }

    if ($request->hasFile('video')) {
      if ($girl->video != null) {
        Storage::delete('public/' . $girl->video);
      }
      $fileName3 = uniqid() . '_' . $request->file('video')->getClientOriginalName();
      $request->file('video')->storeAs('public/', $fileName3);
      $girl->video = $fileName3;
    }

    if ($request->hasFile('description_photo_one')) {
      if ($girl->description_photo_one != null) {
        Storage::delete('public/' . $girl->description_photo_one);
      }

      $fileName2 = uniqid() . '_' . $request->file('description_photo_one')->getClientOriginalName();
      $request->file('description_photo_one')->storeAs('public/', $fileName2);
      $girl->description_photo_one = $fileName2;
    }

    if ($request->hasFile('description_photo_two')) {
      if ($girl->description_photo_two != null) {
        Storage::delete('public/' . $girl->description_photo_two);
      }

      $fileName5 = uniqid() . '_' . $request->file('description_photo_two')->getClientOriginalName();
      $request->file('description_photo_two')->storeAs('public/', $fileName5);
      $girl->description_photo_two = $fileName5;
    }

    if ($request->hasFile('description_photo_three')) {
      if ($girl->description_photo_three != null) {
        Storage::delete('public/' . $girl->description_photo_three);
      }

      $fileName6 = uniqid() . '_' . $request->file('description_photo_three')->getClientOriginalName();
      $request->file('description_photo_three')->storeAs('public/', $fileName6);
      $girl->description_photo_three = $fileName6;
    }

    if ($request->hasFile('description_photo_four')) {
      if ($girl->description_photo_four != null) {
        Storage::delete('public/' . $girl->description_photo_four);
      }

      $fileName7 = uniqid() . '_' . $request->file('description_photo_four')->getClientOriginalName();
      $request->file('description_photo_four')->storeAs('public/', $fileName7);
      $girl->description_photo_four = $fileName7;
    }

    $girl->name = $request->name;
    $girl->country = $request->country;
    $girl->age = $request->age;
    $girl->height = $request->height;
    $girl->type = $request->type;
    $girl->description = $request->description;
    $girl->girl_commission = $request->girl_commission ?? 50;
    $girl->get_service = $request->get_service;
    $girl->save();

    $existingTime = TimePrice::where('girlid', $id)->get();
    $count = count($request->time);
    for ($i = 0; $i < $count; $i++) {
      if ($i < $existingTime->count()) {
        $existingTimePrice = $existingTime[$i];
        $existingTimePrice->time = $request->input('time')[$i];
        $existingTimePrice->price = $request->input('price')[$i];
        $existingTimePrice->save();
      } else {
        $time_price = new TimePrice();
        $time_price->girlid = $id;
        $time_price->time = $request->input('time')[$i];
        $time_price->price = $request->input('price')[$i];
        $time_price->save();
      }
    }

    // Delete extra Travel records
    if ($existingTime->count() > $count) {
      $toDelete = $existingTime->splice($count);
      foreach ($toDelete as $time) {
        $time->delete();
      }
    }

    return redirect()
      ->route('girl#girlPage')
      ->with('update', 'Girl Updated Successfully!');
  }

  // girl delete
  public function girlDelete($id)
  {
    $oldImage = Girl::where('id', $id)->first();
    // dd($oldImage);
    $oldImage1 = $oldImage->profile_photo;
    $oldImage2 = $oldImage->description_photo;

    Storage::delete('public/' . $oldImage1);
    Storage::delete('public/' . $oldImage2);
    Girl::where('id', $id)->delete();
    return redirect()
      ->back()
      ->with(['delete' => 'Country Delete Is Successfully!']);
  }

  public function girlDetail($id)
  {
    $girl = Girl::where('id', $id)->first();
    $categorys = Category::all();
    return view('girl.detail', compact('girl', 'categorys'));
  }

  // public function commissionReportList(Request $request)
  // {
  //   // dd($request);
  //   $reports = Order::select('orders.*', 'girls.girl_commission')
  //     ->join('girls', 'orders.girl_id', '=', 'girls.id')
  //     ->get();
  //   $totalPrice = Order::sum('price');
  //   $totalCommission = Order::sum('girl_commission');
  //   // $totalPrice = ReportCommission::sum('price');
  //   return view('report.report_commission', compact('reports', 'totalPrice', 'totalCommission'));
  // }

  public function commissionReportList(Request $request)
  {
    $reports = Girl::latest()->get();
    $total_time = [];
    $total_price = []; // Initialize $total_price as an empty array

    foreach ($reports as $report) {
      $total_time[$report->id] = Order::where('girl_id', $report->id)
        ->where('state', 'Accept')
        ->sum('time');
      $total_price[$report->id] = Order::where('girl_id', $report->id)
        ->where('state', 'Accept')
        ->sum('price');
    }
    $totalPrice = Order::sum('price');
    $totalCommission = Girl::sum('girl_commission');
    return view(
      'report.report_commission',
      compact('reports', 'total_time', 'total_price', 'totalPrice', 'totalCommission')
    );
  }

  public function commissionDateSearch(Request $request)
  {

    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $reports = Girl::latest()->get();
    $total_time = [];
    $total_price = [];
    foreach ($reports as $report) {
      $query = Order::where('girl_id', $report->id)
        ->where('state', 'Accept');
      if ($startDate && $endDate) {
        $query->whereBetween('created_at', [$startDate, $endDate]);
      }

      $total_time[$report->id] = $query->sum('time');
      $total_price[$report->id] = $query->sum('price');
    }
    $totalPrice = Order::sum('price');
    $totalCommission = Girl::sum('girl_commission');
    return view(
      'report.report_commission',
      compact('reports', 'total_time', 'total_price', 'totalPrice', 'totalCommission', 'startDate', 'endDate')
    );
  }


  public function girlHistory($id)
  {
    $girl = Girl::find($id);
    $history = Order::where('girl_id', $girl->id)
      ->where('state', 'Accept')
      ->get();

    return view('report.girl_history', compact('history', 'girl'));
  }

  public function gitlHistorySearch(Request $request, $girl_id)
  {
    $girl = Girl::find($girl_id);
    $query = Order::where('girl_id', $girl->id)
      ->where('state', 'Accept');

    // Check if date range is provided
    if ($request->has('start_date') && $request->start_date != '') {
      $startDate = $request->start_date;
      $query->whereDate('created_at', '>=', $startDate);
    }
    if ($request->has('end_date') && $request->end_date != '') {
      $endDate = $request->end_date;
      $query->whereDate('created_at', '<=', $endDate);
    }

    $history = $query->latest()->get();

    return view('report.girl_history', compact('history', 'girl'));
  }

  public function nameSearch(Request $request)
  {
    $search = $request->input('search', '');

    $query = Girl::latest();
    if (!empty($search)) {
      $query->where('name', 'like', '%' . $search . '%');
    }
    $reports = $query->get();

    $total_time = [];
    $total_price = [];

    foreach ($reports as $report) {
      $total_time[$report->id] = Order::where('girl_id', $report->id)
        ->where('state', 'Accept')
        ->sum('time');
      $total_price[$report->id] = Order::where('girl_id', $report->id)
        ->where('state', 'Accept')
        ->sum('price');
    }

    $totalPrice = Order::sum('price');
    $totalCommission = Girl::sum('girl_commission');

    if (!empty($search)) {
      return view(
        'report.report_commission',
        compact('reports', 'total_time', 'total_price', 'totalPrice', 'totalCommission', 'search')
      );
    }
  }
}
