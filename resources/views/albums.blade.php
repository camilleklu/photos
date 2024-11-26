@extends("layouts.app")
    @section("content")

    @foreach ($albums as $a)
        <a href="{{ url('accueil/albums/' . $a->id) }}">{{ $a->titre }}</a><br>
    @endforeach

    <form action="/accueil/albums/edit" method="POST">
    @csrf
    <input type="text" name="titre" placeholder="Titre de l'album" required>
    <button type="submit">Ajouter un album</button>
</form>


@endsection

