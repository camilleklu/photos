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

                <form action="{{ route('photo.delete', ['id' => $photo->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette photo ?')">✕</button>
            </form>

            </div>

         

        @endforeach
    </div>





    <h1>Ajouter une photo à cet album</h1>
    <form class="add-album" action="{{ route('photo.edit', ['id' => request()->route('id')]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="titre" placeholder="Titre de la photo" required>
        <label for="file">Choisir une image</label>
        <input id="file" name="url" type="file" style="display:none;">        
        <input type="text" name="note" placeholder="Note">
        <input type="text" name="tags" placeholder="Tags (séparés par des virgules)">
        <button type="submit">Ajouter la photo</button>
    </form>

@endsection