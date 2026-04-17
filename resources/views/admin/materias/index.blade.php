@extends('adminlte::page')

@section('title', 'Listado de materias')

@section('content_header')
    <h1><b>Listado de materias</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8"> {{-- Este tamaño es el que se ve en la foto, no ocupa todo el ancho --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Materias registradas</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-registrar">
                            Crear nueva materia
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%">Nro</th>
                                <th style="width: 70%">Materia</th>
                                <th style="width: 25%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $contador = 1; @endphp
                            @foreach($materias as $materia)
                                <tr class="text-center">
                                    <td>{{ $contador++ }}</td>
                                    <td>{{ $materia->nombre }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-registrar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Registro de una nueva materia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.materias.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre de la materia (*)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                                </div>
                                <input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre de la materia..." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop