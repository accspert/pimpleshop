@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Forgot Password</h1>
        <p style="text-align: center;">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="checkout-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>

            <button type="submit" class="checkout-btn" style="margin-top: 2rem;">Email Password Reset Link</button>
        </form>
    </div>
@endsection