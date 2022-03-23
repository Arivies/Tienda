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
            <div class="card-header text-white bg-secondary">Guardar Libro</div>
            <div class="card-body">
                <form action="{{ route('libros.store') }}" method="POST" >
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="titulo" name="titulo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Editorial</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="editorial" name="editorial">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Autor</label>
                        <div class="col-sm-10">
                            <div class="card">
                                <div class="card-header bg-secondary text-white"><strong>Seleccione Autores</strong></div>
                                <div class="card-body">
                                    @foreach ($autores as $id=>$nombre)
                                        <label for="name" class="col-sm-10">{{ $nombre }}</label>
                                        <input type="checkbox" class="form-check-input col-sm-2 ml-1" name="autores[]" value="{{ $id}}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                            <a class="btn btn-secondary btn-sm" href="{{ route('libros.index') }}">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
