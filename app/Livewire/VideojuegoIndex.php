<?php

namespace App\Livewire;

use App\Models\Videojuego;
use Livewire\Component;

class VideojuegoIndex extends Component
{
    public $videojuegos;
    public function mount()
    {
        $this->videojuegos = Videojuego::all();
    }

    public function render()
    {
        return view('livewire.videojuego-index', [
            'videojuegos' => $this->videojuegos,
        ]);
    }
}
