<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CrearVacante extends Component
{
    use LivewireAlert;

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
        'salario' => ['required', 'integer', 'min:1', 'max:9'],
        'categoria' => ['required', 'integer', 'min:1', 'max:7'],
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
        $datos['imagen'] = str_replace('public/vacantes/', '', $url_imagen);

        //Crear la vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'user_id' => auth()->user()->id,
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
        ]);

        //Crear un mensaje de succes
        $this->flash('success', 'La vacante se público correctamente', [
            'position' => 'top-end',
            'timer' => '4997',
            'toast' => true,
        ], '/');

        //Redireccionar
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        // Consulta DB
        $salarios = Salario::all('id','salario');
        $categorias = Categoria::all('id','categoria');

        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }
}
