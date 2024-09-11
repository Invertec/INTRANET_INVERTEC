<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use App\Models\Link;
use Illuminate\Support\Facades\Storage;

class ModalLinks extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $show;
    public $links_ingresados;
    public $imagenes, $links, $textos;
    protected $listeners = ['showModalLinks' => 'showModalLinks'];
    
    public function showModalLinks() {
        $this->links_ingresados = Link::all();
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
        $this->imagenes = null;
        $this->links = null;
        $this->textos = null;
        $this->links_ingresados = null;
    }

    public function agregarLink(){
        //VALIDACIÓN
        $errores = $this->validate([
            'links' => 'required|max:2000|url',
            'textos' => 'required|max:45',
        ]);
       
        DB::beginTransaction();
        try{
            //GUARDADO IMAGEN 
            if ($this->imagenes){
                $ruta_archivo = $this->imagenes->store('img');
            }
            else {
                $ruta_archivo = null;
            }
            //INSERCIÓN EN BD
            Link::insert([
                'imagen' => $ruta_archivo,
                'link' => $this->links,
                'texto' => $this->textos,
            ]);
            //CONFIRMACIÓN INGRESO
            DB::commit();

            $this->flash('success', '', [
                'position' => 'center',
                'timer' => '5000',
                'toast' => false,
                'text' => 'Enlace ingresado correctamente',
                'timerProgressBar' => true,
            ], '/gestiondeposts');

        } catch (\Throwable $e){
            DB::rollback();
            $this->doClose();
            $this->alert('error', '', [
                'position' => 'center',
                'timer' => '',
                'toast' => '1',
                'showDenyButton' => true,
                'denyButtonText' => 'Volver',
                'text' => 'Se ha producido un error al ingresar los datos, intente nuevamente',
                'timerProgressBar' => false,
            ]);
        } 
    }

    public function editarLink($id){
        $this->show = false;
        $this->emit('showModalEditarLink', $id);
    }

    public function eliminarLink($id){
       
        DB::beginTransaction();
        try{
            $link = Link::where('id', $id)->first();
            //BORRADO IMAGEN EN STORAGE
            if ($link->imagen != null){
                Storage::delete($link->imagen);
            }
            //BORRADO DATOS BD
            Link::where('id', $id)->delete();
            //CONFIRMACIÓN
            DB::commit();

            $this->flash('success', '', [
                'position' => 'center',
                'timer' => '5000',
                'toast' => false,
                'text' => 'Enlace eliminado correctamente',
                'timerProgressBar' => true,
            ], '/gestiondeposts');

        } catch (\Throwable $e){
            DB::rollback();
            $this->doClose();
            $this->alert('error', '', [
                'position' => 'center',
                'timer' => '',
                'toast' => '1',
                'showDenyButton' => true,
                'denyButtonText' => 'Volver',
                'text' => 'Se ha producido un error al eliminar este enlace, intente nuevamente',
                'timerProgressBar' => false,
            ]);
        } 
    }

    public function render(){
        return view('livewire.modals.modal-links');
    }
}