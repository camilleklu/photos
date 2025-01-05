@extends("layouts.app")

@section("content")
<div class="accueil">

    <div class="banniere">
    </div>

    <div class="banner">
        @auth
        <h2 style="display: none;">Bonjour {{Auth::user()->name}}</h2>
        @else
        @endauth

        <h1>Créer des albums photos</h1>

        <p>Découvrez la création d'albums photos personnalisés qui pourront être vu par tous le monde</p>

        <a href="{{ route('albums') }}">Créer un album</a>

    </div>


    @endsection