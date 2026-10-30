@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Modificar</h1>
    <h5>Formulario para Actualizar Productos</h5>
    <hr>
    <div class="container">
        <form action="/products/update/{{ $producto->codigo }}" method="post">
            @csrf
             @method('PUT')
            <div class="row">
                <div class="col-6">
                    Nombre
                    <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-6">
                    Precio
                    <input type="text" class="form-control" name="precio" value="{{ $producto->precio }}">
                    @error('precio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    Marca
                    <select name="marca" id="" class="form-control">
                        <option value="">Seleccione una marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->codigo }}" {{ $producto->marca == $marca->codigo ? 'selected' : '' }}>
                                {{ $marca->nombre }}
                            </option>
                        @endforeach

                    </select>
                    @error('marca')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12" mt-2>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection