@extends("layouts.app")
    @section("content")

    <h1>Les Albums</h1>

    <div class="album_tab">
    @foreach ($albums as $a)
    <a href="{{ url('accueil/albums/' . $a->id) }}" id="album">
    <div class="album">
    <img src="{{ $a->image_url }}" alt="Image de présentation"> 
        <p>{{ $a->titre }}</p>
       
    </div>
    </a>

@endforeach
</div>

    <form action="/accueil/albums/edit" method="POST">
    @csrf
    <input type="text" name="titre" placeholder="Titre de l'album" required>
    <button type="submit">Ajouter un album</button>
</form>


@endsection

