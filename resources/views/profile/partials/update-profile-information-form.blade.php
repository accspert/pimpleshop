<section class="profile-update-form">
    
    <form method="post" action="{{ route('profile.update') }}" class="form-grid-layout">
        @csrf
        @method('patch')
        
        <header>
            <h2>{{ __('Konto Informationen') }}</h2>
            <p>{{ __("Hier kannst du deine Konto Daten ändern") }}</p>
        </header>
        <br></br>
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">{{ __('Adresse') }}</label>
            <input id="address" name="address" type="text" class="form-control" value="{{ old('address', $user->address) }}" required autocomplete="address" />
            @error('address')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="city">{{ __('Stadt') }}</label>
            <input id="city" name="city" type="text" class="form-control" value="{{ old('city', $user->city) }}" required autocomplete="city" />
            @error('city')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group save-actions" style="grid-column: span 2;"> 
            <button type="submit" class="button">{{ __('Sichern') }}</button>
            @if (session('status') === 'profile-updated')
                <p class="alert alert-success">{{ __('Gespeichert') }}</p>
            @endif
        </div>
    </form>
</section>