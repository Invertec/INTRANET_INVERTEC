<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

use App\Models\Link;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ModalEditarLink extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $show;
    public $link_elegido, $imagen_elegida;
    public $link, $imagen, $link_texto;
    protected $listeners = ['showModalEditarLink' => 'showModalEditarLink'];

    public function showModalEditarLink($id) {
        $this->link_elegido = Link::where('id', $id)->first();
        if ($this->link_elegido){
            $this->link = $this->link_elegido->link;
            $this->link_texto = $this->link_elegido->texto;
            $this->imagen_elegida = $this->link_elegido->imagen;
        }
        $this->dispatchBrowserEvent('setDataToQuill', $this->link_texto);
        $this->doShow();
    }

    public function mount(){
        $this->show = false;
    }

    public function doShow(){
        $this->show = true;
    }

    public function doClose(){
        $this->show = false;

        $this->link =null;
        $this->link_texto =null;
        $this->imagen_elegida =null;
        $this->imagen = null;
        $this->emit('showModalLinks');
    }

    public function editarLink(){
        $errores = $this->validate([
            'link' => 'required|max:2000',
            'link_texto' => 'required|max:45',
            ]);

        try {
            if ($this->imagen) {
                if ($this->imagen_elegida){
                    Storage::delete($this->imagen_elegida);
                }
                $ruta_archivo = $this->imagen->store('img');
                $this->link_elegido->imagen = $ruta_archivo;
    
            }
            $this->link_elegido->link = $this->link;
            $this->link_elegido->texto = $this->link_texto;
            $this->link_elegido->save();
    
            $this->flash('success', '', [
                'position' => 'center',
                'timer' => '5000',
                'toast' => false,
                'text' => 'Datos del link editados correctamente',
                'timerProgressBar' => true,
            ], '/gestiondeposts');

        } catch (\Throwable $e){
            $this->doClose();
            $this->alert('error', '', [
                'position' => 'center',
                'timer' => '',
                'toast' => '1',
                'showDenyButton' => true,
                'denyButtonText' => 'Volver',
                'text' => 'Se ha producido un error al editar los datos, intente nuevamente',
                'timerProgressBar' => false,
            ]);
        }
    }

    public function render(){
        return view('livewire.modals.modal-editar-link');
    }
}