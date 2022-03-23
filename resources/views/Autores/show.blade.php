@extends('layout')

@section('content')
    <div class="container-sm w-75">
        <div class="card mt-5">
            <div class="card-header bg-secondary text-white">DETALLE DEL AUTOR</div>
            <div class="card-body">
                <div class="d-flex">
                    <table class="table">
                        <tr>
                            <td>ID:</td>
                            <td class="text-center">{{ $autore->id }}</td>
                        </tr>
                        <tr>
                            <td>NOMBRE:</td>
                            <td class="text-center">{{ $autore->nombre }}</td>
                        </tr>
                        <tr>
                            <td>CORREO:</td>
                            <td class="text-center">{{ $autore->correo }}</td>
                        </tr>
                        <tr>
                            <td>TELEFONO: </td>
                            <td class="text-center"> {{ $autore->telefono }}</td>
                        </tr>
                        <tr>
                            <td>LIBROS: </td>
                            <td class="text-center">
                                @forelse ($autore->libros as $libro)
                                    {{ $libro->titulo}}
                                @empty
                                    Sin autores asignados
                                @endforelse

                            </td>
                        </tr>
                    </table>
                </div>
                <a class="btn btn-secondary btn-sm" href="{{ route('autores.index') }}">REGRESAR</a>
            </div>
        </div>
    </div>
@endsection
