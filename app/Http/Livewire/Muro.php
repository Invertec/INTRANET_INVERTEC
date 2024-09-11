<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Imagen;
use App\Models\Post;

class Muro extends Component
{
    public $publicaciones;
    public $intervals = [];

    public function mount() {
        $this->publicaciones = Post::orderBy('fecha', 'desc')->get();
        //DURACION SLIDE SEGÚN SI ES VIDEO O IMÁGENES
        foreach ($this->publicaciones as $publicacion) {
            if (count($publicacion->imagenes)){
                //COMPROBACION DE SI ES VIDEO
                if ($publicacion->imagenes[0]->duracion != null) {
                    $this->intervals[$publicacion->id] = $publicacion->imagenes[0]->duracion;
                } else {
                    $this->intervals[$publicacion->id] = 20000;
                }
            } else {
                $this->intervals[$publicacion->id] = 20000;
            }
        }
    }

    public function render(){
        return view('livewire.muro');
    }
}
