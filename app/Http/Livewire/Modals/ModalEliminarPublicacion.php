<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

use App\Models\Post;
use App\Models\Imagen;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ModalEliminarPublicacion extends Component
{
    use LivewireAlert;

    public $show;
    public $publicacion;
    protected $listeners = ['showModalEliminarPublicacion' => 'showModalEliminarPublicacion'];

    public function showModalEliminarPublicacion($id) {
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

    public function eliminarPublicacion(){
        DB::beginTransaction();

        try {
            $publicacion = Post::where('id', $this->publicacion->id)->first();
            //BORRADO IMÁGENES
            foreach($publicacion->imagenes as $imagen){
                if ($imagen->imagen != null){
                    Storage::delete($imagen->imagen);
                }
                Imagen::where('id', $imagen->id)->delete();
            }
            //BORRADO PUBLICACIÓN
            Post::where('id', $this->publicacion->id)->delete();
            //CONFIRMACIÓN CAMBIOS
            DB::commit();
            //REDIRECCIÓN Y MENSAJE 
            $this->flash('success', '', [
                'position' => 'center',
                'timer' => '5000',
                'toast' => false,
                'text' => 'Publicación eliminada correctamente',
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
                'text' => 'Se ha producido un error al eliminar la publicación, intente nuevamente',
                'timerProgressBar' => false,
            ]);
        }
    }

    public function render(){
        return view('livewire.modals.modal-eliminar-publicacion');
    }
}
