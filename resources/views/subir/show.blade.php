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
                <p><a href="{{ route('subir.index') }}" class="btn btn-primary">Volver a la lista</a></p>
            </div>
        </div>
    </div>
@endsection