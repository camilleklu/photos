@extends("layouts.app")

@section("content")

<form class="login-register" action="{{route("register.store")}}" method="post">
    @csrf
    <input class="login-register" type="text" name="name" required placeholder="Name" /><br />
    <input type="email" name="email" required placeholder="Email" /><br />
    <input type="password" name="password" required placeholder="password" /><br />
    <input type="password" name="password_confirmation" required placeholder="password" /><br />
    <button type="submit">Envoyez</button><br />
</form>
Déjà un compte  ? <a href="{{route("login")}}">Connectez vous</a>



@endsection
