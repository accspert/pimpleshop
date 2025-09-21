@extends('layouts.app')

@section('title', 'Order Placed')

@section('content')
    <div class="container text-center">
        <h1>Bestellung wurde aufgegeben!</h1>
        <p>Danke für deine Bestellung. Wir nehmen in Kürze Kontakt mit dir auf.</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Weiter einkaufen</a>
    </div>
@endsection