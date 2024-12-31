@extends("layouts.app")
@section("content")

<h1>Les Albums</h1>

<form method="GET" action="{{ url()->current() }}" class="filter-album">
    <input type="text" name="titre" placeholder="Rechercher par titre" value="{{ request('titre') }}">
    <select name="date">
        <option value="" disabled {{ request('date') == null ? 'selected' : '' }}>Trier par date</option>
        <option value="desc" {{ request('date') == 'desc' ? 'selected' : '' }}>Plus récents</option>
        <option value="asc" {{ request('date') == 'asc' ? 'selected' : '' }}>Plus anciens</option>
    </select>
    <button type="submit">Appliquer</button>
</form>


<div class="album_tab">
    @foreach ($albums as $a)
    <a href="{{ url('accueil/albums/' . $a->id) }}" id="album">
        <div class="album">
            <img src="{{ $a->image_url ?: asset('/images/white-background.avif') }}" alt="Image de présentation">

            <p class="titre-albums">{{ $a->titre }}</p>

            <form action="{{ route('album.delete', ['id' => $a->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet album et toutes ses photos ?')">✕</button>
            </form>

        </div>
    </a>



    @endforeach
</div>


<h1>Ajouter un album</h1>

<form class="add-album" action="/accueil/albums/edit" method="POST">
    @csrf
    <input type="text" name="titre" placeholder="Titre de l'album" required>
    <button type="submit">Ajouter un album</button>
</form>


@endsection