@extends('adminlte::page')

@section('title', 'Listado de roles')

@section('content_header')
    <h1><b>Listado de roles</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-registrar">
                            Crear nuevo rol
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th width="50px">Nro</th>
                                <th>Nombre del rol</th>
                                <th width="200px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $contador = 1; @endphp
                            @foreach($roles as $rol)
                                <tr class="text-center">
                                    <td>{{ $contador++ }}</td>
                                    <td>{{ $rol->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Editar</button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</button>
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
                    <h4 class="modal-title">Llene los datos del formulario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre del rol (*)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="DOCENTE" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-arrow-left"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop