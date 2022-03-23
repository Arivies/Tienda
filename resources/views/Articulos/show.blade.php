@extends('layout')

@section('content')
    <div class="container-sm w-75">
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">DETALLE DE ARTICULO</div>
            <div class="card-body">
                <div class="d-flex">
                    <table class="table">
                        <tr>
                            <td>ID:</td>
                            <td class="text-center">{{ $articulo->id }}</td>
                        </tr>
                        <tr>
                            <td>ARTICULO:</td>
                            <td class="text-center">{{ $articulo->articulo }}</td>
                        </tr>
                        <tr>
                            <td>CATEGORIA:</td>
                            <td class="text-center"> {{ $articulo->categoria }}</td>
                        </tr>
                        <tr>
                            <td>CANTIDAD:</td>
                            <td class="text-center">{{ $articulo->cantidad }}</td>
                        </tr>
                        <tr>
                            <td>PRECIO: </td>
                            <td class="text-center">$ {{ $articulo->precio }}</td>
                        </tr>
                    </table>
                    <img src="{{ $ruta.$articulo->imagen }}" width="250px" height="200px">
                </div>
                <a class="btn btn-secondary btn-sm" href="{{ route('articulos.index') }}">REGRESAR</a>
            </div>
        </div>
    </div>
@endsection
