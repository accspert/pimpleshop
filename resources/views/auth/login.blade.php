@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Anmelden</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="checkout-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <div class="form-group">
                <label for="password">Passwort</label>
                <input id="password" type="password" name="password" class="form-control" required autocomplete="current-password">
            </div>

            <div class="form-group" style="margin-top: 1rem;">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Merke mich</span>
                </label>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem;">
                <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Passwort vergessen?
                </a>
                <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Noch nicht registriert?</a>
            </div>

            <button type="submit" class="checkout-btn" style="margin-top: 2rem;">Anmelden</button>
        </form>
    </div>
@endsection