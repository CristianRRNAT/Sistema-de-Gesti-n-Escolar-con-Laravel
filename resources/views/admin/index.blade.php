@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido: </b>{{ Auth::user()->name }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/colegio.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Gestiones registradas</b></span>
                        <span class="info-box-number">{{ $total_gestiones }} gestiones</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Periodos registrados</b></span>
                        <span class="info-box-number">{{ $total_periodos }} periodos</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/lista.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Niveles registrados</b></span>
                        <span class="info-box-number">{{ $total_niveles }} niveles</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/cliente.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Grados registrados</b></span>
                        <span class="info-box-number">{{ $total_grados }} grados</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/velocidad.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Paralelos registrados</b></span>
                        <span class="info-box-number">{{ $total_paralelos }} paralelos</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/reloj.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Turnos registrados</b></span>
                        <span class="info-box-number">{{ $total_turnos }} turnos</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box zoomP">
                    <img src="{{ url('/img/libro.gif') }}" width="70px" alt="">
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Materias registradas</b></span>
                        <span class="info-box-number">{{ $total_materias }} materias</span>
                    </div>
                </div>
            </div>

        </div> </div> @stop

@section('css')
    <style>
        .zoomP:hover {
            transform: scale(1.1);
            transition: all 0.3s ease-in-out;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Dashboard cargado correctamente");
    </script>
@stop