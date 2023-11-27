<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depositos extends Model
{
    use HasFactory;
    protected $fillable = ['Nro_de_transacciones', 'Nombre', 'Ingresos'];

    // Definición de la relación con Curso
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'cursos_id');
    }
}
