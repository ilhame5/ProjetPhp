<form class="section" action="/modification-mot-de-passe" method="post">
    {{ csrf_field() }}

    <div class="field">
        <label class="label">Nouveau mot de passe</label>
        <div class="control">
            <input class="input" type="password" name="password">
        </div>
        @if($errors->has('password'))
            <p>{{ $errors->first('password') }}</p>
        @endif
    </div>

    <div class="field">
        <label class="label">Mot de passe (confirmation)</label>
        <div class="control">
            <input class="input" type="password" name="password_confirmation">
        </div>
        @if($errors->has('password_confirmation'))
            <p>{{ $errors->first('password_confirmation') }}</p>
        @endif
    </div>

    <div class="field">
        <div class="control">
            <button class="button is-link" type="submit">Modifier mon mot de passe</button>
        </div>
    </div>
</form>