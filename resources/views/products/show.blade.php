@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Productos</h1>
    <h5>Listado de Productos</h5>
    <hr>
    <a href="/products/create" class="btn btn-success btn-sm">
        Agregar Nuevo Producto
    </a>
    <table class="table table-hover table-bordered mt-2">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Marca</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>${{ number_format($item->precio, 2) }}</td>
                    <td>{{ $item->marca_nombre }}</td>
                    <td>
                        <a href="/products/edit/{{ $item->codigo }}" class="btn btn-warning btn-sm">Modificar</a>
                        <button type="button" class="btn btn-danger btn-sm" url="/products/destroy/{{ $item->codigo }}"
                            token="{{ csrf_token() }}" onclick="destroy(this)">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/products.js') }}"></script>
@endsection