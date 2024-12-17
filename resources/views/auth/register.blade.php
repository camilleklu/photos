@extends("layouts.app")

@section("content")

<h1>S'inscrire</h1>

<form class="login-register" action="{{route("register.store")}}" method="post">
    @csrf
    <input  type="text" name="name" placeholder="Name" required  /><br>
    <input type="email" name="email" required placeholder="Email" /><br>
    <input type="password" name="password" required placeholder="password" /><br>
    <input type="password" name="password_confirmation" required placeholder="password" /><br>
    <button type="submit">Envoyez</button>
    <span class="span">Déjà un compte  ? <a href="{{route("login")}}">Connectez vous</a></span>
</form>




@endsection
