<section class="profile-update-form">
    
    <form method="post" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')
        
        <header>
            <h2>{{ __('Konto löschen') }}</h2>
            <p>{{ __('Sobald Ihr Konto gelöscht ist, werden alle darin enthaltenen Ressourcen und Daten dauerhaft gelöscht. Laden Sie vor dem Löschen Ihres Kontos alle Daten und Informationen herunter, die Sie behalten möchten.') }}</p>
        </header>
        <p>{{ __('Bitte geben Sie Ihr Passwort ein, um die endgültige Löschung Ihres Kontos zu bestätigen.') }}</p>

        <div class="form-group">
            <label for="password_delete">{{ __('Passwort') }}</label>
            <input id="password_delete" name="password" type="password" class="form-control" />
            @error('password', 'userDeletion')
                <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="button button-danger">{{ __('Konto löschen') }}</button>
        </div>
    </form>
</section>