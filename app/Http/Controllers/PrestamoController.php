<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrestamoRequest;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\User;
use App\Services\PrestamoService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    protected $prestamoService;

    public function __construct(PrestamoService $prestamoService) { $this->prestamoService = $prestamoService; }
    
    public function index()
    {
        $prestamos = Prestamo::with(['usuario', 'libro'])->get();

        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $libros = Libro::all();
        $usuarios = User::all();

        return view('prestamos.create', compact('libros','usuarios'));
    }
    
    public function store(StorePrestamoRequest $request) {

        $prestamo = $this->prestamoService->crearPrestamo($request->validated());

        return redirect()->route('prestamos.index')->with('success', 'Libro creado exitosamente.');

    }
    
    public function devolver($id) {

        $prestamo = $this->prestamoService->devolverLibro($id);

        return redirect()->route('prestamos.index')->with('success', 'Libro creado exitosamente.');
    }
}
