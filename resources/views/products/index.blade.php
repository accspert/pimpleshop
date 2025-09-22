@extends('layouts.app')

@section('title', 'Unsere Möbel')

@section('content')
<div class="container">
    <h1>Ihre neuen Möbel</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
            <h2>{{ $product->name }}</h2>
            <div class="product-image">
                <a href="{{ route('products.show', $product->id) }}">
                    @if ($product->image_path)
                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                    @endif
                </a>
            </div>
            <div class="product-price">
                <span>CHF {{ number_format($product->price, 2) }}</span>
            </div>
            <div>
                <a href="{{ route('products.show', $product->id) }}" class="details-button">Details anzeigen</a>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="button">In den Warenkorb</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection