@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Departamento') }}</h1>
        <form method="POST" action="{{ route('departamentos.update', $departamentos->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                    <label for="direccion">{{ __('Direccion') }}</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="renta">{{ __('Renta') }}</label>
                    <input type="int" name="renta" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="propietario_id">{{ __('Propietario') }}</label>
                    <select name="propietario_id" class="form-control" required>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        </form>
    </div>
@endsection
