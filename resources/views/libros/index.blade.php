@extends('adminlte::page')

@section('title', 'Lista de Libros')

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <h1>Libros Disponibles
            <a href="{{ route('libros.create') }}">
                <button style="padding: 10px 20px; font-size: 16px;">Nuevo Libro</button>
            </a>
        </h1>
    </div>

    @if($libros->isEmpty())
        <p>No hay libros cargados.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>{{ $libro->disponible ? 'Disponible' : 'No disponible' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    @endif
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
