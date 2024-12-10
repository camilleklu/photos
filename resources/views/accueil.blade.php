@extends("layouts.app")

@section("content")



@auth
<h2 style="text-align: start ;">Bonjour {{Auth::user()->name}}</h2> 
@else
@endauth



@endsection
