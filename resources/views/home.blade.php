@extends('layouts.app')

@section('title', 'Möbel von Hand mit Herz')

@section('content')

<section id="hero">
    <div class="container">
        <h1>HandHerzHolz</h1>
        <h2>Möbel von Hand mit Herz</h2>
        <p>Wir bauen Möbel für dein nächstes Abenteuer.</p>
            <a href="{{ route('products.index') }}" class="button">Hier gehts zu deinen neuen Möbeln</a>
        </div>
    </section>

@endsection