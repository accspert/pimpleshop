@extends('layouts.app')

@section('title', 'Ihr Warenkorb')

@section('content')
    <div class="container">
        <h1>Warenkorb</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($cart && count($cart) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Möbel</th>
                        <th>Preis</th>
                        <th>Menge</th>
                        <th>Zwischensumme</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach($cart as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td>CHF{{ number_format($details['price'], 2) }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>CHF{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="button">Entfernen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="cart-total">
                <p>Gesamtsumme: CHF{{ number_format($total, 2) }}</p>
            </div>
            <div style="text-align: right;">
                <a href="{{ route('checkout.index') }}" class="checkout-btn">Zur Kasse gehen</a>
            </div>

        @else
            <p class="cart-empty">Ihr Warenkorb ist leer.</p>
        @endif
    </div>
@endsection