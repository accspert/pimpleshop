@extends('layouts.app')

@section('title', 'Zur Kasse gehen')

@section('content')
<div class="container">
    <h1>Bestellung aufgeben</h1>
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('checkout.process') }}" method="POST" class="checkout-form">
        @csrf

        <h3>Versandinformationen</h3>
        @auth
        <div class="form-group">
            <label for="name">Vollständiger Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="email">E-Mail Adresse</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ Auth::user()->address }}" readonly>
        </div>
        <div class="form-group">
            <label for="city">Stadt</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ Auth::user()->city }}" readonly>
        </div>
        @else
        <div class="form-group">
            <label for="name">Vollständiger Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="email">E-Mail Adresse</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
        </div>
        <div class="form-group">
            <label for="city">Stadt</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
        </div>
        @endauth

        <div class="order-summary">
            <h3>Bestellübersicht</h3>
            <ul>
                @foreach($cart as $details)
                <li><span>{{ $details['name'] }} x {{ $details['quantity'] }}</span><span>CHF{{ number_format($details['price'] * $details['quantity'], 2) }}</span></li>
                @endforeach
            </ul>
            <div class="total">
                <h4>Gesamtsumme: CHF{{ number_format($total, 2) }}</h4>
            </div>
        </div>

        <button type="submit" class="checkout-btn">Bestellung aufgeben</button>
    </form>
</div>
@endsection