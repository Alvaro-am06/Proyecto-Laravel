@extends('components.layout')

@section('content')
    <h1>Feed de Memes</h1>
    <ul>
        @foreach ($memes as $meme)
            <li>
                <strong>{{ $meme->titulo }}</strong><br>
                <img src="{{ $meme->url }}" alt="{{ $meme->titulo }}" width="200">
            </li>
        @endforeach
    </ul>
@endsection
