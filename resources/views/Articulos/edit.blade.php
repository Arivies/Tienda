@extends('layout')

@section('content')
    <div class="container-sm w-75">
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">EDITAR DE ARTICULOS</div>
            <div class="card-body">
                <form action="{{ route('articulos.update', $articulo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Articulo:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="articulo"
                                value="{{ $articulo->articulo }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Categoria:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="categoria"
                                value="{{ $articulo->categoria }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Cantidad:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="cantidad"
                                value="{{ $articulo->cantidad }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Precio:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm" name="precio"
                                value="{{ $articulo->precio }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Imagen:</label>
                        <div class="col-sm-8">
                            <img src="{{ $ruta.$articulo->imagen }}">
                            <input type="hidden" class="form-control form-control-sm" name="ant_imagen"
                                value="{{ $articulo->imagen }}">
                                <input type="file" class="form-control form-control-sm" name="imagen"
                                value="" accept="image/*">
                        </div>
                    </div>
                    <button class="btn btn-secondary btn-sm">ACTUALIZAR</button>
                    <a class="btn btn-secondary btn-sm" href="{{ route('articulos.index') }}">REGRESAR</a>
                </form>
            </div>
        </div>
    </div>
@endsection