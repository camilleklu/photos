@extends("layouts.app")

@section("content")

<h1>Connexion</h1>

<form class="login-register" action="{{route("login.store")}}" method="post">
@csrf
  <input type="email" name="email" required placeholder="Email" /><br />
  <input type="password" name="password" required placeholder="password" /><br />
  <div class="checkbox-container">
    <input type="checkbox" id="remember" name="remember" />
    <label for="remember">Remember Me</label>
  </div>
  <br />
  <input type="submit" /><br />
</form>



@endsection