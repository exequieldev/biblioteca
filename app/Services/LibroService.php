<?php

namespace App\Services;

use App\Models\Libro;

class LibroService {
    public function crear(array $data) {
        return Libro::create($data);
    }
}