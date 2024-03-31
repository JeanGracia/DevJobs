<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads; // Al incluir esta declaración estás permitiendo que el componente maneje la carga de archivos desde el formulario HTML.

    protected $rules = [
        'titulo' => ['required', 'string', 'max:255'],
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => ['required', 'string', 'max:100'],
        'ultimo_dia' => ['required', 'date', 'after:today'], // after:today asegura que la fecha proporcionada en el campo sea una fecha futura con respecto a la fecha actual
        'descripcion' => 'required', // El campo "descripcion" es requerido
        'imagen' => ['required', 'image', 'max:2048'], // El campo "imagen" es requerido, debe ser una imagen válida (JPEG, PNG, GIF, SVG, o BMP) y max especifica el tamaño máximo del archivo en kilobytes (en este caso, 2048 KB o 2 MB).
    ];

    public function crearVacante()
    {
        $datos = $this->validate();

        //Almacenar la imagen
        $url_imagen = $this->imagen->store('public/vacantes');

        //Crear la vacante

        //Crear un mensaje de succes

        //Redireccionar
    }

    public function render()
    {
        $salarios = Salario::all('salario');
        $categorias = Categoria::all('categoria');

        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }
}
