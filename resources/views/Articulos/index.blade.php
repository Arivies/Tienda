@extends('layout')
@section('content')


@if ($mensaje = Session::get('success'))
<div class="alert alert-success py-2 mt-1 text-center" style="height: 45px;" id="msg">
    <strong>{{ $mensaje }}</strong>
</div>
@endif

    <div class="container mt-3 d-flex justify-content-center">
        <div class="card mt-3 col-md-9 ">
            <div class="card-header text-white bg-secondary">Articulos</div>
            <div class="card-body">
                <a class="btn btn-sm btn-secondary mb-2" href="{{ route('articulos.create') }}">Registrar Articulos</a>
                <table class="table table-striped table-sm text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Articulo</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articulos as $articulo)
                            <tr>
                                <td>{{ $articulo->id }}</td>
                                <td>{{ $articulo->articulo }}</td>
                                <td>{{ $articulo->categoria }}</td>
                                <td>{{ $articulo->cantidad }}</td>
                                <td class="d-flex flex-row justify-content-center">
                                    <a class="btn btn-sm btn-info"
                                        href="{{ route('articulos.show', $articulo->id) }}">VER</a>&nbsp;
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('articulos.edit', $articulo->id) }}">EDITAR</a>&nbsp;
                                    <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger"> ELIMINAR</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$articulos->links()}}
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $("#msg").fadeOut(7000);
    });
</script>
@endsection