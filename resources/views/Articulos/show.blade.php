@extends('layout')

@section('content')
    <div class="container-sm w-75">
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">DETALLE DE ARTICULO</div>
            <div class="card-body">
                <table>
                    <tr>
                        <td>ID:</td>
                        <td>{{ $articulo->id }}</td>
                    </tr>
                    <tr>
                        <td>ARTICULO:</td>
                        <td>{{ $articulo->articulo }}</td>
                    </tr>
                    <tr>
                        <td>CATEGORIA:</td>
                        <td> {{ $articulo->categoria }}</td>
                    </tr>
                    <tr>
                        <td>CANTIDAD:</td>
                        <td>{{ $articulo->cantidad }}</td>
                    </tr>
                    <tr>
                        <td>PRECIO: </td>
                        <td>$ {{ $articulo->precio }}</td>
                    </tr>
                </table>
                <a class="btn btn-secondary btn-sm" href="{{ route('articulos.index') }}">REGRESAR</a>
            </div>
        </div>
    </div>
@endsection
