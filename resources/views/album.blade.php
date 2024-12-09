@extends("layouts.app")

@section("content")
    @foreach ($album as $t)
        <h1>{{ $t->titre }}</h1>
    @endforeach


    
   
     <div class="tab_pt">
        @foreach ($photos as $photo)
            <div class="photos">
                <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" class="thumbnail" width="200">

            <div id="modal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="modal-img">
            <div id="caption"></div>
            </div>

                <p>{{ $photo->titre }}</p>

                <div class="tags">
                    @foreach ($photo->tags as $tag)
                        <span>#{{ $tag->nom }}</span>
                    @endforeach
                </div>
            </div>

        @endforeach
    </div>





    <h2>Ajouter une photo à cet album</h2>
    <form action="{{ route('photo.edit', ['id' => request()->route('id')]) }}" method="POST">
        @csrf
        <input type="text" name="titre" placeholder="Titre de la photo" required>
        <input type="text" name="url" placeholder="URL" required>
        <input type="text" name="note" placeholder="Note">
        <input type="text" name="tags" placeholder="Tags (séparés par des virgules)">
        <button type="submit">Ajouter la photo</button>
    </form>

@endsection