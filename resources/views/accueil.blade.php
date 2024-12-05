@extends("layouts.app")

@section("content")

<h1>Coucou</h1>

<h1>Page d'accueil</h1>

@auth
<h2>Bonjour {{Auth::user()->name}}</h2>
@else
@endauth



@endsection
