@extends("layouts.app")

@section("content")

<h1>Connexion</h1>

<form class="login-register" action="{{route("login.store")}}" method="post">
@csrf
  <input type="email" name="email" required placeholder="Email" /><br />
  <input type="password" name="password" required placeholder="password" /><br />
  <button type="submit">Envoyez</button><br />
</form>



@endsection

