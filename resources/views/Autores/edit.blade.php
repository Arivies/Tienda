@extends('layout')

@section('content')
    <div class="container-sm w-75">
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">EDITAR DE AUTOR</div>
            <div class="card-body">
                <form action="{{ route('autores.update', $autore->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Nombre:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="nombre"
                                value="{{ $autore->nombre }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Correo:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="correo"
                                value="{{ $autore->correo }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Telefono:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="telefono"
                                value="{{ $autore->telefono }}">
                        </div>
                    </div>
                    <button class="btn btn-secondary btn-sm">ACTUALIZAR</button>
                    <a class="btn btn-secondary btn-sm" href="{{ route('autores.index') }}">REGRESAR</a>
                </form>
            </div>
        </div>
    </div>
@endsection
