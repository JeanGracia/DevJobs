<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo' => ['required', 'string', 'max:255'],
        'salario' => ['required', 'numeric', 'between:1,9'], // between:1,9 valida que el value sea mayor o igual a 1 y menor o igual a 9
        'categoria' => ['required', 'numeric', 'between:1,7'],
        'empresa' => ['required', 'string', 'max:100'],
        'ultimo_dia' => ['required', 'date', 'after:today'], // after:today asegura que la fecha proporcionada en el campo sea una fecha futura con respecto a la fecha actual
        'descripcion' => ['required', 'string', 'max:1000'], // El campo "descripcion" es requerido, debe ser una cadena de texto y tener como máximo 1000 caracteres
        'imagen' => ['required', 'image', 'max:2048'], // El campo "imagen" es requerido, debe ser una imagen válida (JPEG, PNG, GIF, SVG, o BMP) y max especifica el tamaño máximo del archivo en kilobytes (en este caso, 2048 KB o 2 MB).
    ];

    public function crearVacante()
    {
        $datos = $this->validate();
    }

    public function render()
    {
        $salarios = Salario::all('salario');
        $categorias = Categoria::all('categoria');

        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }
}
