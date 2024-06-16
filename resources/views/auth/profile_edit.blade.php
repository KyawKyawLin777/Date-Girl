@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection


@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                {{-- <span class="app-brand-logo demo">@include('_partials.macros', [
                                    'width' => 25,
                                    'withbg' => 'var(--bs-primary)',
                                ])</span> --}}
                                <span
                                    class="app-brand-text demo text-body fw-bold">{{ __('messages.my profile edit') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        {{-- <h4 class="mb-2">Adventure starts here 🚀</h4>
                        <p class="mb-4">Make your app management easy and fun!</p> --}}

                        <form id="formAuthentication" class="mb-3" action="{{ route('profile.update', $user->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="username" class="form-label">{{ __('messages.username') }}</label>
                                <input type="text" class="form-control" id="username" name="name"
                                    placeholder="Enter your username" value="{{ $user->name }}" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('messages.email') }}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ $user->email }}">
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('messages.password') }}</label>
                                <div class="input-group input-group-merge">
                                    <!-- Hidden input field to store the actual password value -->
                                    <input type="hidden" id="actual-password" name="actual_password"
                                        value="{{ $user->password }}" />

                                    <!-- Password input field with placeholder -->
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer" onclick="togglePasswordVisibility()">
                                        <i id="password-toggle-icon" class="bx bx-hide"></i>
                                    </span>
                                </div>
                            </div>

                            {{-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                                    <label class="form-check-label" for="terms-conditions">
                                        I agree to
                                        <a href="javascript:void(0);">privacy policy & terms</a>
                                    </label>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary d-grid w-100">
                                Update
                            </button>
                        </form>

                        {{-- <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="{{ url('auth/login-basic') }}">
                                <span>Sign in instead</span>
                            </a> --}}
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var actualPasswordInput = document.getElementById('actual-password');
            var icon = document.getElementById('password-toggle-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordInput.value = actualPasswordInput.value; // Show actual password value
                icon.classList.remove('bx-hide');
                icon.classList.add('bx-show');
            } else {
                passwordInput.type = 'password';
                passwordInput.value = ''; // Clear password value
                icon.classList.remove('bx-show');
                icon.classList.add('bx-hide');
            }
        }
    </script>
@endsection
