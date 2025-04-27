<?php

namespace App\Services;

use App\Models\Sancion;

class SancionService {
    public function crearSancion(array $data) {
        return Sancion::create($data);
    }

    public function desactivarSancion($id) {
        $sancion = Sancion::findOrFail($id);
        $sancion->update(['activa' => false]);
        return $sancion;
    }
}