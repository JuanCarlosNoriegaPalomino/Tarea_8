@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Alquiler') }}</h1>
        <form method="POST" action="{{ route('alquileres.update', $alquiler->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                        <label for="monto">{{ __('Monto') }}</label>
                        <input type="int" name="monto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Fecha_inicio') }}</label>
                        <input type="date" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Fecha_fin') }}</label>
                        <input type="date" name="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        </form>
    </div>
@endsection
