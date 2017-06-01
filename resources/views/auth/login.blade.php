<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Auth login</title>
    </head>
    <body>
        @if (session('error'))
        <div> ERREUR: mauvais mot de passe ou nom blablabla </div>
        @endif
        <form method="POST" action="{{ action('AuthController@check') }}">
            {{ csrf_field() }}
            <input type="text" placeholder="email" name="email">
            <input type="password" placeholder="mot de passe" name="password">
            <input type="submit" value="login">
        </form>
        <a href="{{ action('AuthController@oAuth') }}">Log with GOOGLE</a>
    </body>
</html>
