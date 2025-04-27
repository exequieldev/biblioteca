@extends('adminlte::page')

@section('title', 'Lista de Prestamos')

{{-- @section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <h1>Prestamos Pendientes
            <a href="{{ route('prestamos.create') }}">
                <button style="padding: 10px 20px; font-size: 16px;">Nuevo Prestamo</button>
            </a>
        </h1>
    </div>

    @if($prestamos->isEmpty())
        <p>No hay prestamos cargados.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Libro</th>
                    <th>Fecha Prestamo</th>
                    <th>Fecha Devolucion</th>
                    <th>Estado</th>
                    
                       <th>Opciones</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->usuario->name ?? 'Sin usuario' }}</td>
                        <td>{{ $prestamo->libro->titulo ?? 'Sin libro' }}</td>
                        <td>{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') }}</td>
                        <td>{{ $prestamo->devuelto ? 'Devuelto' : 'Prestado' }}</td>
                        
                            <td>
                                <form action="{{ route('prestamos.cambiarEstado', $prestamo->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PATCH')
                                    @if ($prestamo->devuelto == 0)
                                        <button type="submit" style="padding: 5px 10px;">
                                            {{ $prestamo->devuelto ? 'Marcar como Prestado' : 'Marcar como Devuelto' }}
                                        </button>
                                    @endif
                                    
                                </form>
                            </td>
                        
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
