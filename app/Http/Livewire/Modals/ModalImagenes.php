<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Post;

class ModalImagenes extends Component
{
    public $show;
    public $publicacion;

    protected $listeners = ['showModalImagenes' => 'showModalImagenes'];

    public function showModalImagenes($id) {
        $this->publicacion = Post::where('id', $id)->first();
        $this->doShow();
    }

    public function mount() {
        $this->show = false;
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function render(){
        return view('livewire.modals.modal-imagenes');
    }
}
