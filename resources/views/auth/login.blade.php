@extends("layouts.app")

@section("content")

<form action="{{route("login.store")}}" method="post">
@csrf
  <input type="email" name="email" required placeholder="Email" /><br />
  <input type="password" name="password" required placeholder="password" /><br />
  Remember me<input type="checkbox" name="remember"   /><br />
  <input type="submit" /><br />
</form>



@endsection
