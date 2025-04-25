<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LibroService;

class LibroController extends Controller
{
    protected $libroService;
    public function __construct(LibroService $libroService) { $this->libroService = $libroService; }

    public function store(StoreLibroRequest $request) {

        $libro = $this->libroService->crear($request->validated());
        
        return response()->json($libro);

    }
}
