@extends('layouts.app')

@section('content')
    <h1>Résultats de recherche</h1>
    @if(isset($photos))
        <h2>Résultats pour "{{ $query }}":</h2>
        <div class="album_tab">
            @forelse($photos as $photo)
            <div class="album">
                    <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" width="100">
                    <p>{{ $photo->titre }}</p>
            </div>
            @empty
                <li>Aucun résultat trouvé.</li>
            @endforelse
</div>
    @endif
@endsection