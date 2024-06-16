<?php

namespace App\Http\Controllers;

use App\Models\TextCreate;
use Illuminate\Http\Request;

class TextCreateController extends Controller
{
  public function index()
  {
    $texts = TextCreate::latest()->get();

    return view('text.text', compact('texts'));
  }

  public function store(Request $request)
  {

    $test = new TextCreate();
    $test->text = $request->text;
    $test->save();
    return redirect()->back()->with('success', 'Text Create Successfully!');
  }

  public function edit($id)
  {

    $texts = TextCreate::find($id);

    return view('text.text_edit', compact('texts'));
  }
  public function update($id, Request $request)
  {

    $texts = TextCreate::find($id);
    $texts->text = $request->text;
    $texts->update();
    return redirect(url('text'))->with('update', 'Text Update Successfully!');
  }

  public function delete($id)
  {
    $texts = TextCreate::find($id);
    $texts->delete();
    return redirect()->back()->with('delete', 'Text Delete Successfully!');
  }
}
