<?php

namespace App\Livewire;

use App\Http\Requests\StoreVideojuegoRequest;
use App\Models\Desarrolladora;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VideojuegoIndex extends Component
{
    public $desarrolladoras;

    public $videojuegoid;

    public $titulo;
    public $anyo;
    public $desarrolladora_id;

    public $estaEditando = false;

    public function mount()
    {
        $this->desarrolladoras = Desarrolladora::all();
    }

    public function crear()
    {
        $validated = $this->validate((new StoreVideojuegoRequest())->rules());
        Videojuego::create($validated);
    }

    public function editar($videojuegoid)
    {
        $this->videojuegoid = $videojuegoid;
        $videojuego = Videojuego::findOrFail($videojuegoid);
        $this->titulo = $videojuego->titulo;
        $this->anyo = $videojuego->anyo;
        $this->desarrolladora_id = $videojuego->desarrolladora_id;
        $this->estaEditando = true;
    }

    public function render()
    {
        return view('livewire.videojuego-index', [
            'videojuegos' => Auth::user()->videojuegos,
            'desarrolladoras' => $this->desarrolladoras,
        ]);
    }
}
