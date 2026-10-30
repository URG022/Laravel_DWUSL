@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sistema de Inventario') }}</div>

                <div class="card-body">
                    @guest
                        <p>Debes Iniciar Sesión</p>

                    @else
                        <p>Bienvenido,  {{Auth::user()->name  }}</p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
