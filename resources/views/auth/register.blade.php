@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Register</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="checkout-form">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="username">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" type="text" name="address" class="form-control" value="{{ old('address') }}" required autocomplete="address">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input id="city" type="text" name="city" class="form-control" value="{{ old('city') }}" required autocomplete="city">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Already registered?</a>
            </div>

            <button type="submit" class="checkout-btn" style="margin-top: 2rem;">Register</button>
        </form>
    </div>
@endsection