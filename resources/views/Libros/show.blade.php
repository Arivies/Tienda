@extends('layout')

@section('content')
    <div class="container-sm w-75">
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">DETALLE DEL LIBRO</div>
            <div class="card-body">
                <div class="d-flex">
                    <table class="table">
                        <tr>
                            <td>ID:</td>
                            <td class="text-center">{{ $libro->id }}</td>
                        </tr>
                        <tr>
                            <td>TITULO:</td>
                            <td class="text-center">{{ $libro->titulo }}</td>
                        </tr>
                        <tr>
                            <td>EDITORIAL:</td>
                            <td class="text-center"> {{ $libro->editorial }}</td>
                        </tr>
                    </table>
                </div>
                <a class="btn btn-secondary btn-sm" href="{{ route('libros.index') }}">REGRESAR</a>
            </div>
        </div>
    </div>
@endsection
