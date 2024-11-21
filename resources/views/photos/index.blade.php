@extends('base')

@section('content')
<h1>Lista de Fotos</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Original</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($photos as $photo)
        <tr>
            <td>{{ $photo->id }}</td>
            <td>{{ $photo->original_name }}</td>
            <td>{{ $photo->name }}</td>
            <td>{{ $photo->created_at }}</td>
            <td><a href="{{ route('photos.show', $photo) }}">Ver</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection