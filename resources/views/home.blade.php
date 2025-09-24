@extends('layouts.app')

@section('title', 'Welcome to Our Webshop')

@section('content')

<section id="hero">
    <div class="container">
        <h2>Möchten Sie schöne Möbel für ihren Van?</h2>
        <p> Wir bauen Möbel für ihr nächstes Abenteuer.</p>
            <a href="{{ route('products.index') }}" class="button">Hier gehts zu ihren neuen Möbeln</a>
        </div>
    </section>

@endsection