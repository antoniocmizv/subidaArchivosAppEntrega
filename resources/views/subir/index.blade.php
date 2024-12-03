
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Fotos</h1>
        <a href="{{ route('subir.create') }}" class="btn btn-primary mb-3">Añadir Imagen</a>
        @if($subirs->isEmpty())
            <p>No hay imágenes subidas. <a href="{{ route('subir.create') }}">Subir una imagen</a></p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Original</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Vista Previa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subirs as $subir)
                        <tr>
                            <td>{{ $subir->id }}</td>
                            <td>{{ $subir->nombre_original }}</td>
                            <td>{{ $subir->nombre }}</td>
                            <td>{{ $subir->created_at }}</td>
                            <td>
                                <a href="{{ route('subir.show', $subir->id) }}">
                                    <img src="{{ route('photos.view', $subir) }}" alt="{{ $subir->nombre_original }}" style="max-width: 100px; height: auto;">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('subir.show', $subir->id) }}" class="btn btn-info">Ver</a>
                                <form action="{{ route('subir.destroy', $subir->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta foto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            <div class="d-flex justify-content-center"></div></div>
                {{ $subirs->links('pagination::bootstrap-4') }}
            </div>
            <style>
                .pagination svg {
                    width: 20px;
                    height: 20px;
                }
            </style>
            
        @endif
    </div>
@endsection