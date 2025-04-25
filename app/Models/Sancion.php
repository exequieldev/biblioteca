<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'motivo', 'fecha_inicio', 'fecha_fin', 'activa'];
    public function usuario() { return $this->belongsTo(User::class); }
}
