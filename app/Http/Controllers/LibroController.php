<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLibroRequest;
use App\Models\Libro;
use App\Services\LibroService;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    protected $libroService;
    
    public function __construct(LibroService $libroService) { 
            $this->libroService = $libroService; 
    }

    public function index()
    {
        $libros = Libro::all();

        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(StoreLibroRequest $request) {

        // dd($request);
        $libro = $this->libroService->crear($request->validated());
        // $libro = Libro::create($data);

       
        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');
    }
}
