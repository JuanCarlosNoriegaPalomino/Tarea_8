@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Alquileres') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('alquileres.create') }}" class="btn btn-primary">{{ __('Agregar Alquiler') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Monto</th>
                            <th>Fecha_inicio</th>
                            <th>Fecha_fin</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($alquileres as $alquileres)
                            <tr>
                                <td>{{ $alquiler->monto }}</td>
                                <td>{{ $alquiler->Fecha_inicio }}</td>
                                <td>{{ $alquiler->Fecha_fin }}</td>

                                <td>
                                    <a href="{{ route('alquileres.show', $alquiler) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                    <a href="{{ route('alquileres.edit', $alquiler) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('alquileres.destroy', $alquiler) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
