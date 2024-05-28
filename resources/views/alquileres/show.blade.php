@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalles del Alquiler') }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('Monto') }}</h5>
                <p class="card-text">{{ $alquiler->monto }}</p>

                <h5 class="card-title">{{ __('Fecha inicio') }}</h5>
                <p class="card-text">{{ $alquiler->fecha_inicio }}</p>

                <h5 class="card-title">{{ __('Fecha fin') }}</h5>
                <p class="card-text">{{ $alquiler->fecha_fin }}</p>

                <!-- Otros detalles del alquiler -->
            </div>
        </div>
    </div>
@endsection
