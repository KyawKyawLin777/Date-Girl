<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function edit($id)
  {
    $user = User::find($id);
    return view('auth.profile_edit', compact('user'));
  }

  public function update(Request $request, $id)
  {
    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;

    // Update password if a new password is provided
    if ($request->filled('password')) {
      $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect(url('dashboard'))->with('success', 'Profile updated successfully');
  }
}
