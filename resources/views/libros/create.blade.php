@extends('adminlte::page')

@section('title', 'Crear Libro')

@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
        <h1>Nuevo Libro</h1>
        <a href="{{ route('libros.index') }}">
            <button style="padding: 10px 20px; font-size: 16px;">Volver a la lista</button>
        </a>
    </div>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" style="width: 100%;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="autor">Autor:</label><br>
            <input type="text" id="autor" name="autor" style="width: 100%;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="disponible">Disponible:</label><br>
            <select id="disponible" name="disponible" style="width: 100%;" required>
                <option value="1">Disponible</option>
                <option value="0">No disponible</option>
            </select>
        </div>

        <button type="submit" style="padding: 10px 20px; font-size: 16px;">Guardar Libro</button>
    </form>
@stop

@section('css')
@stop

@section('js')
    <script> console.log("Formulario para crear un libro cargado."); </script>
@stop