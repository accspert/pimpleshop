@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1>Willkommen zu deinem Dashboard, {{ Auth::user()->name }}!</h1>
        <p>Du bist eingeloggt.</p>

        <div class="user-details">
            <h2>Deine Daten</h2>
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Adresse:</strong> {{ Auth::user()->address }}</p>
            <p><strong>Stadt:</strong> {{ Auth::user()->city }}</p>
        </div>

        <a href="{{ route('profile.edit') }}" class="button">Profil bearbeiten</a>
        <a href="{{ route('products.index') }}" class="button">Zu den Möbeln</a>
    </div>
@endsection