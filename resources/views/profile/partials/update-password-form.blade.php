<section class="profile-update-form">
    
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <header>
            <h2>{{ __('Passwort ändern') }}</h2>
            <p>{{ __('Benutze ein langes Passwort mit Sonderzeichen') }}</p>
        </header>

        <div class="form-group">
            <label for="current_password">{{ __('Derzeitiges Passwort') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            @error('current_password', 'updatePassword')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Neues Passwort') }}</label>
            <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
            @error('password', 'updatePassword')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">{{ __('Passwort wiederholen') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="button">{{ __('Sichern') }}</button>
            @if (session('status') === 'password-updated')
                <p class="alert alert-success">{{ __('Gespeichert') }}</p>
            @endif
        </div>
    </form>
</section>