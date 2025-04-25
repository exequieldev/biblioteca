<?php

namespace App\Services;

class LibroService {
    public function crear(array $data) {
        return Libro::create($data);
    }
}