<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{
    public function render()
    {
        $salarios = Salario::all('salario');
        $categorias = Categoria::all('categoria');

        return view('livewire.crear-vacante', compact('salarios', 'categorias'));
    }
}
