@extends('layout')

@section('content')
<div class="container mt-3 d-flex justify-content-center">
    <div class="card mt-3 col-md-9 ">
        <div class="card-header text-white bg-secondary">Libros</div>
        <div class="card-body">
            <a class="btn btn-sm btn-secondary mb-2" href="{{ route('libros.create') }}">Registrar Libro</a>
            <table class="table table-striped table-sm text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Editorial</th>
                        <th>Autor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                        <tr>
                            <td>{{ $libro->id }}</td>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->editorial }}</td>
                            <td>
                                @forelse ($libro->autores as $autor)
                                    <span class="badge badge-secondary">{{ $autor->nombre}}</span>
                                @empty
                                    <span class="badge badge-warning">Rol sin permisos asignados</span>
                                @endforelse
                            </td>
                            <td class="d-flex flex-row justify-content-center">
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('libros.show', $libro->id) }}">VER</a>&nbsp;
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('libros.edit', $libro->id) }}">EDITAR</a>&nbsp;
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"> ELIMINAR</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$libros->links()}}
        </div>
    </div>
</div>
@endsection



@section('js')
@endsection
