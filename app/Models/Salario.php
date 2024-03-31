<?php

namespace App\Models;

use App\Models\Vacante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salario extends Model
{
    use HasFactory;

    protected $table = 'public.salarios'; // Especifica el nombre de la tabla

    protected $primaryKey = 'id'; // Esta propiedad te permite especificar el nombre de la clave primaria de la tabla. Por defecto, Laravel asume que la clave primaria se llama "id"

    protected $fillable = [
        'salario'
    ]; // Especifica los campos que pueden ser asignados en masa

    protected $guarded = [
        '',
        '',
        ''
    ]; // Especifica los campos que no pueden ser asignados en masa

    public $timestamps = true; // Indica si el modelo debe manejar automáticamente marcas de tiempo, si tus tablas no tienen campos como "created_at" y "updated_at" puedes cambiar a false de manera que te permita hacer un insert para agregar mas rangos de salarios

    // Relación uno a muchos con Vacante
    public function vacantes()
    {
        return $this->hasMany(Vacante::class);
    }
}
