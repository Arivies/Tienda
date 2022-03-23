@extends('layout')

@section('content')
<div class="container mt-3 d-flex justify-content-center">
    <div class="card mt-3 col-md-9 ">
        <div class="card-header text-white bg-secondary">Autores</div>
        <div class="card-body">
            <a class="btn btn-sm btn-secondary mb-2" href="{{ route('autores.create') }}">Registrar Autor</a>
            <table class="table table-striped table-sm text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)
                        <tr>
                            <td>{{ $autor->id }}</td>
                            <td>{{ $autor->nombre }}</td>
                            <td>{{ $autor->correo }}</td>
                            <td>{{ $autor->telefono }}</td>
                            <td class="d-flex flex-row justify-content-center">
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('autores.show', $autor->id) }}">VER</a>&nbsp;
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('autores.edit', $autor->id) }}">EDITAR</a>&nbsp;
                                <form action="{{ route('autores.destroy', $autor->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"> ELIMINAR</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$autores->links()}}
        </div>
    </div>
</div>
@endsection



@section('js')
@endsection
