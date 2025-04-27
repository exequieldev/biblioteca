@extends('adminlte::page')

@section('title', 'Nuevo Préstamo')

@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
        <h1>Nuevo Préstamo</h1>
        <a href="{{ route('prestamos.index') }}">
            <button style="padding: 10px 20px; font-size: 16px;">Volver a la lista</button>
        </a>
    </div>

    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="usuario">Usuario:</label><br>
            <select id="usuario" name="usuario_id" style="width: 100%;" required>
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="libro">Libro:</label><br>
            <select id="libro" name="libro_id" style="width: 100%;" required>
                <option value="">Seleccione un libro</option>
                @foreach($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="fecha_prestamo">Fecha de Préstamo:</label><br>
            <input type="date" id="fecha_prestamo" name="fecha_prestamo" style="width: 100%;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="fecha_devolucion">Fecha de Devolución:</label><br>
            <input type="date" id="fecha_devolucion" name="fecha_devolucion" style="width: 100%;" required>
        </div>

        <button type="submit" style="padding: 10px 20px; font-size: 16px;">Guardar Préstamo</button>
    </form>
@stop

@section('css')
@stop

@section('js')
    <script> console.log("Formulario para crear préstamo cargado."); </script>
@stop