@extends("app")

@section("content")
    @foreach ($photos as $photo)
        <div>
            <img src="{{ $photo->url }}" alt="{{ $photo->titre }}" width="200">
            <p>{{ $photo->titre }}</p>
        </div>
    @endforeach
@endsection
