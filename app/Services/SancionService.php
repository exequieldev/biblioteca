<?php

namespace App\Services;

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