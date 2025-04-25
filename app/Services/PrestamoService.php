<?php
 
namespace App\Services;

class PrestamoService {
    public function crearPrestamo(array $data) {
        $libro = Libro::findOrFail($data['libro_id']);
        if (!$libro->disponible) {
            throw new \Exception('El libro no está disponible');
        }
        $libro->update(['disponible' => false]);
        return Prestamo::create($data);
    }

    public function devolverLibro($id) {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update(['devuelto' => true]);
        $prestamo->libro->update(['disponible' => true]);
        return $prestamo;
    }
}