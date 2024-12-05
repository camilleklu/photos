@extends("layouts.app")

@section("content")
@foreach ($album as $t)
        <h1>{{ $t->titre }}</h1>
    @endforeach
    
    <div class="tab_pt">
    @foreach ($photos as $photo)
        <div class="photos">
            <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" width="200">
            <p>{{ $photo->titre }}</p>
        </div>
    @endforeach
    </div>


    <h2>Ajouter une photo à cet album</h2>
    <form action="{{ route('photo.edit', ['id' => request()->route('id')]) }}" method="POST">
        @csrf
        <input type="text" name="titre" placeholder="Titre de la photo" required>
        <input type="text" name="url" placeholder="URL" required>
        <input type="text" name="note" placeholder="Note">
        <button type="submit">Ajouter la photo</button>
    </form>
@endsection