<?php

namespace App\Models;

use App\Models\Vacante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['categoria'];

    // Relación uno a muchos con Vacante
    public function vacantes()
    {
        return $this->hasMany(Vacante::class);
    }
}
