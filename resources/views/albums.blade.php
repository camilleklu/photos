@extends("app")
    @section("content")

    @foreach ($albums as $a)
        <a href="{{ url('accueil/albums/' . $a->id) }}">{{ $a->titre }}</a><br>
    @endforeach

@endsection

