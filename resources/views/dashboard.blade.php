@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1>Willkommen zu deinem Dashboard!</h1>
        <p>Du bist eingeloggt.</p>
        <a href="{{ route('products.index') }}" class="button">Zu den Möbeln</a>
    </div>
@endsection