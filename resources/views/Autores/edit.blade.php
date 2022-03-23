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
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label col-form-label-sm">Libros:</label>
                        <div class="col-sm-8">
                            <div class="card mt-5">
                                <div class="card-header bg-secondary text-white"><strong>Seleccione Libros</strong></div>
                                <div class="card-body">
                                    @foreach ($libros as $id=>$titulo)
                                        <label for="name" class="col-sm-10">{{ $titulo }}</label>
                                        <input type="checkbox" class="form-check-input col-sm-2 ml-1" name="libros[]"
                                        value="{{ $id }}"  {{ $autore->libros->contains($id)? 'checked': '' }}>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary btn-sm">ACTUALIZAR</button>
                    <a class="btn btn-secondary btn-sm" href="{{ route('autores.index') }}">REGRESAR</a>
                </form>
            </div>
        </div>
    </div>
@endsection
