<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'user_id',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen'
    ];

    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}