@extends('adminlte::page')

@section('title', 'Listado de paralelos')

@section('content_header')
    <h1><b>Listado de paralelos</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10"> {{-- Ajuste de ancho para que no ocupe toda la pantalla --}}
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Paralelos registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-registrar">
                            Crear nuevo paralelo
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 5%">Nro</th>
                                <th style="width: 40%">Grados</th>
                                <th style="width: 30%">Paralelos</th>
                                <th style="width: 25%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $contador = 1; @endphp
                            @foreach($paralelos as $paralelo)
                                <tr class="text-center">
                                    <td>{{ $contador++ }}</td>
                                    <td>{{ $paralelo->grado->nombre ?? 'N/A' }}</td>
                                    <td>
                                        <span class="btn btn-info btn-xs">{{ $paralelo->nombre }}</span>
                                    </td>
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

    {{-- MODAL DE REGISTRO --}}
    <div class="modal fade" id="modal-registrar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Registro de un nuevo paralelo</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.paralelos.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="grado_id">Grados (*)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-table"></i></span>
                                </div>
                                <select name="grado_id" id="grado_id" class="form-control" required>
                                    <option value="">Seleccione un grado</option>
                                    @foreach($grados as $grado)
                                        <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre del paralelo (*)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-copy"></i></span>
                                </div>
                                <input type="text" name="nombre" class="form-control" placeholder="Escriba el nombre del paralelo..." required>
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