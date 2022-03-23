@extends('layout')
@section('content')

{{-- @if ($mensaje = Session::get('error'))
<div class="alert alert-danger py-2 mt-1 text-center"  id="msg">
    <strong>{{ $mensaje }}</strong>
</div>
@endif
--}}
    <div class="container mt-5 d-flex justify-content-center">

        <div class="card mt-3 col-md-8 ">
            <div class="card-header text-white bg-secondary">Guardar Autor</div>
            <div class="card-body">
                <form action="{{ route('autores.store') }}" method="POST" >
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="correo" name="correo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Libros</label>
                        <div class="col-sm-10">
                            <div class="card">
                                <div class="card-header bg-secondary text-white"><strong>Seleccione Libros</strong></div>
                                <div class="card-body">
                                    @foreach ($libros as $id=>$titulo)
                                        <label for="name" class="col-sm-10">{{ $titulo }}</label>
                                        <input type="checkbox" class="form-check-input col-sm-2 ml-1" name="libros[]" value="{{ $id }}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                            <a class="btn btn-secondary btn-sm" href="{{ route('autores.index') }}">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
