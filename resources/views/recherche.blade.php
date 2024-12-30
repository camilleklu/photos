@extends('layouts.app')

@section('content')
<h1>Résultats de recherche</h1>
@if(isset($photos))
<h2>Résultats pour "{{ $query }}":</h2>
<div class="album_tab">
    @forelse($photos as $photo)

    <div class="album">
        <a href="{{ route('albums.photos', ['id' => $photo->album_id]) }}">
            <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" width="100">
            <p>{{ $photo->titre }}</p>
        </a>
    </div>
    @empty
    <li>Aucun résultat trouvé.</li>
    @endforelse
</div>
@endif
@endsection