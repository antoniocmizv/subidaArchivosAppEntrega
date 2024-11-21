@extends('base')

@section('content')
<h1>{{ $photo->original_name }}</h1>
<img src="{{ route('photos.view', $photo) }}" alt="{{ $photo->original_name }}">
<p>Nombre: {{ $photo->name }}</p>
<p>Subido el: {{ $photo->created_at }}</p>
@endsection