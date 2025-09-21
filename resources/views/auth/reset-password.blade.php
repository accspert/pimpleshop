@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="container">
        <h1>Reset Password</h1>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
            </div>

            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="button">Reset Password</button>
            </div>
        </form>
    </div>
@endsection