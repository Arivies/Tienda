@extends('layout')

@section('content')
    <div class="container-sm w-75">
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">EDITAR DE Libro</div>
            <div class="card-body">
                <form action="{{ route('libros.update', $libro->id) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Titulo:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="titulo"
                                value="{{ $libro->titulo }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Editorial:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="editorial"
                                value="{{ $libro->editorial }}">
                        </div>
                    </div>
                    <button class="btn btn-secondary btn-sm">ACTUALIZAR</button>
                    <a class="btn btn-secondary btn-sm" href="{{ route('libros.index') }}">REGRESAR</a>
                </form>
            </div>
        </div>
    </div>
@endsection
