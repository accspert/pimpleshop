@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container">
    <a href="{{ route('products.index') }}">Zurück zu Möbel</a>

    <h1>{{ $product->name }}</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($product->image_path)
    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-width: 400px;">
    @endif

    <p>{{ $product->description }}</p>
    <p>Preis: CHF{{ number_format($product->price, 2) }}</p>

    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <label for="quantity">Menge:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">
        <button type="submit" class="button">In den Warenkorb</button>
    </form>
</div>
@endsection