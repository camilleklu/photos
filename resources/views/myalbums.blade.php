@extends('layouts.app')

@section('content')
    <h1>Mes albums</h1>


<div class="album_tab">
    @if($albums && count($albums) > 0)
            @foreach($albums as $album)
            <div class="album">
                        <a href="{{ route('albums.photos', $album->id) }}" id="album">
                        @if($album->image_url)
                            <img src="{{ $album->image_url }}" class="card-img-top" alt="Album {{ $album->titre }}">
                        @else
                            <img src="/images/default-album.png" class="card-img-top" alt="Album par défaut">
                        @endif
                            <p class="card-title">{{ $album->titre }}</p></a>
            </div>
            @endforeach
</div>
    @else
        <p>Aucun album trouvé. <a href="{{ route('albums') }}">Créer un album ?</a></p>
    @endif
@endsection
