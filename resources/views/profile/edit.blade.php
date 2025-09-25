@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <h1>Konto</h1>
        
        <div class="profile-forms">
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
