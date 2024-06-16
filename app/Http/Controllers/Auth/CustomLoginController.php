<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomLoginController extends Controller
{
  // use AuthenticatesUsers;

  protected $redirectTo = '/dashboard';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }


  // public function login(Request $request)
  // {
  //   $request->validate([
  //     'email' => 'required|email',
  //     'password' => 'required|min:6',
  //   ]);

  //   if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
  //     $request->session()->regenerate();

  //     return redirect()->intended('/dashboard'); // Redirect to intended URL or default to /dashboard
  //   }

  //   throw ValidationException::withMessages([
  //     'email' => [trans('auth.failed')],
  //   ]);
  // }
  public function login(Request $request)
  {
    // Validate the request
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|string|min:8',
    ]);

    // Retrieve the user by the given email
    $user = User::where('email', $request->email)->first();

    // Check if the user exists and the password is correct
    if ($user && Hash::check($request->password, $user->password)) {
      // Log the user in
      Auth::login($user);

      // Redirect to the intended page
      return redirect()->intended('/dashboard');
    }

    // If login fails, redirect back with an error message
    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }


  protected function validateLogin(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required|string|min:6',
      // Add custom validation logic here
    ]);
  }

  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }



  protected function authenticated(Request $request, $user)
  {
    return redirect()->intended('/dashboard');
  }
}
