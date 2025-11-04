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
    @if ($product->images && count($product->images) > 0)
    <div class="gallery">
        <div class="main-image">
            <img src="{{ asset($product->images[0]) }}" alt="{{ $product->name }}" id="mainImage">
        </div>
        <div class="thumbnails">
            @foreach ($product->images as $image)
            <img src="{{ asset($image) }}" alt="{{ $product->name }}" class="thumbnail {{ $loop->first ? 'active' : '' }}">
            @endforeach
        </div>
    </div>
    @elseif ($product->image_path)
    <div class="gallery">
        <div class="main-image">
            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" id="mainImage">
        </div>
        <div class="thumbnails">
            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="thumbnail active">
        </div>
    </div>
    @endif

<style>
    .gallery {
        display: flex;
        flex-direction: column;
    }
    .main-image {
        text-align: center;
        margin-bottom: 10px;
    }
    .main-image img {
        max-width: 400px;
        max-height: 400px;
    }
    .thumbnails {
        display: flex;
        justify-content: center;
        gap: 10px;
    }
    .thumbnail {
        width: 80px;
        height: 80px;
        cursor: pointer;
        border: 2px solid transparent;
    }
    .thumbnail.active {
        border-color: #007bff;
    }
</style>

<script>
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            mainImage.src = this.src;
            document.querySelector('.thumbnail.active').classList.remove('active');
            this.classList.add('active');
        });
    });
</script>


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