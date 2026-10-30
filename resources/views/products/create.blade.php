@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
     <h1>Crear</h1>
    <h5>Formulario para crear Productos</h5>
    <hr>

    <div class="container">
        <form action="/products/store" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    Nombre
                    <input type="text" class="form-control" name="nombre">
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-6">
                    Precio
                    <input type="text" class="form-control" name="precio">
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
                            <option value="{{ $marca->codigo }}">{{ $marca->nombre }}</option>
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