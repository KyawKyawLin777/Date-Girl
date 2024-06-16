<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
  // Create Page
  public function countryPage()
  {

    $countries = Category::latest()->get();
    return view('country.create_country', compact('countries'));
  }

  // Store Country Data
  public function countryCreate(Request $request)
  {
    $this->countryValidationCheck($request);
    $data = $this->requestCountry($request);

    if ($request->hasFile('country_image')) {
      $fileName = uniqid() . $request->file('country_image')->getClientOriginalName();
      $request->file('country_image')->storeAs('public', $fileName);
      $data['image'] = $fileName;
    }
    Category::create($data);
    return redirect()
      ->back()
      ->with('success', 'Country Register Is Successfully!');
  }

  // Edit Page
  public function countryEdit($id)
  {
    $country = Category::where('id', $id)->first();
    return view('country.edit_country', compact('country'));
  }

  // Update Country Data
  public function countryUpdate(Request $request, $id)
  {
    $this->countryValidationCheck($request, 'update');
    $data = $this->requestCountry($request);

    if ($request->hasFile('country_image')) {
      $oldImageName = Category::where('id', $request->id)->first();
      $oldImageName = $oldImageName->image;

      if ($oldImageName != null) {
        Storage::delete('public/' . $oldImageName);
      }

      $fileName = uniqid() . $request->file('country_image')->getClientOriginalName();
      $request->file('country_image')->storeAs('public', $fileName);
      $data['image'] = $fileName;
    }
    Category::where('id', $request->id)->update($data);
    return redirect()
      ->route('country#countryPage')
      ->with('update', 'Country Update Is Successfully!');
  }

  // delete country
  public function countryDelete($id)
  {
    $category = Category::find($id);
    if ($category) {
      $oldImage = $category->image;
      if ($oldImage) {
        Storage::delete('public/' . $oldImage);
      }
      $category->delete();
      return redirect()->back()->with(['delete' => 'Country Delete Is Successfully!']);
    } else {
      return redirect()->back()->with(['error' => 'Category not found!']);
    }
  }


  // get request data
  private function requestCountry($request)
  {
    return [
      'country' => $request->country_name,
      'image' => $request->country_image,
    ];
  }

  // validation check country
  private function countryValidationCheck($request)
  {
    Validator::make($request->all(), [
      'country_name' => 'required',
    ])->validate();
  }
}
