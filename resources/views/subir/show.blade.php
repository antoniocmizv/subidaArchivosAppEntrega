@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <h1>{{ $subir->nombre_original }}</h1>
            </div>
            <div class="card-body text-center">
                <img src="{{ route('photos.view', $subir) }}" alt="{{ $subir->nombre_original }}" class="img-fluid" style="border: 5px solid #ddd; padding: 10px; max-width: 100%; height: auto;">
            </div>
            <div class="card-footer text-center">
                <p>
                    <a href="{{ route('subir.index') }}" class="btn btn-primary">Volver a la lista</a>
                    <form action="{{ route('subir.destroy', $subir->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta foto?')">Eliminar</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
@endsection