@extends('layout')
@section('content')
    <div class="container mt-5 d-flex justify-content-center">

        <div class="card mt-3 col-md-8 ">
            <div class="card-header text-white bg-secondary">Guardar Articulor</div>
            <div class="card-body">
                <form action="{{ route('articulos.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Articulo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="articulo" name="articulo">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Categoria</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="categoria" name="categoria">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cantidad" name="cantidad">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Precio</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="precio" name="precio">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                            <a class="btn btn-secondary btn-sm" href="{{ route('articulos.index') }}">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
