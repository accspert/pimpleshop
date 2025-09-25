@extends('layouts.app')

@section('title', 'Welcome to Our Webshop')

@section('content')

<section id="hero">
    <div class="container">
        <h2>Möchtest du schöne Möbel für deinen Van?</h2>
        <p> Wir bauen Möbel für dein nächstes Abenteuer.</p>
            <a href="{{ route('products.index') }}" class="button">Hier gehts zu deinen neuen Möbeln</a>
        </div>
    </section>

@endsection