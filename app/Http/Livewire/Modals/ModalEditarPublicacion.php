<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

use App\Models\Post;
use App\Models\Imagen;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ModalEditarPublicacion extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $show, $video;
    public $edit = false;
    public $publicacion_elegida;
    public $titulo, $fecha, $texto_editar;

    public $link_video, $duracion_video;
    public $imagenes_elegidas = [];
    public $links_elegidos = [];
    public $imagenes = [];
    public $links = [];

    protected $listeners = ['showModalEditarPublicacion' => 'showModalEditarPublicacion'];

    //DATOS PUBLICACIÓN ELEGIDA
    public function showModalEditarPublicacion($id) {
        $this->publicacion_elegida = Post::where('id', $id)->first();
        //DATOS PUBLICACIÓN
        if ($this->publicacion_elegida){
            $this->titulo = $this->publicacion_elegida->titulo;
            $this->texto_editar = $this->publicacion_elegida->texto;
            $this->fecha = $this->publicacion_elegida->fecha;
        }
        //IMÁGENES O VIDEO
        if (count($this->publicacion_elegida->imagenes)){
            //DATOS VIDEO
            if ($this->publicacion_elegida->imagenes[0]->imagen == null && $this->publicacion_elegida->imagenes[0]->link != null){
                $this->link_video = $this->publicacion_elegida->imagenes[0]->link;
                $duracion = substr($this->publicacion_elegida->imagenes[0]->duracion, 0,-3);
                $this->duracion_video = date('i:s', $duracion);
                $this->video = true;
            }
            //IMÁGENES
            else {
                foreach ($this->publicacion_elegida->imagenes as $imagen){
                    $this->imagenes_elegidas[] = $imagen->imagen;
                    $this->links_elegidos[] = $imagen->link;
                }
                $this->duracion_video = "00:30";
            }
        } else {
            $this->duracion_video = "00:30";
        }

        $this->emit('myComponentUpdated');
        $this->doShow();
    }

    public function mount(){
        $this->show = false;
        $this->video = false;
    }

    public function doShow(){
        $this->show = true;
        $this->edit = true;

    }

    public function doClose(){
        $this->show = false;

        $this->titulo =null;
        $this->texto_editar =null;
        $this->fecha =null;
        $this->video = false;
        $this->edit = false;
        foreach ($this->imagenes as $key => $imagen){
            unset($this->imagenes[$key]);
            unset($this->links[$key]);
        }
        foreach ($this->imagenes_elegidas as $key => $imagen){
            unset($this->imagenes_elegidas[$key]);
            unset($this->links_elegidos[$key]);
        }
        $this->link_video = null;
        $this->duracion_video = "00:30";
        $this->emit('modalClosed');
    }

    public function updatedTextoEditar(){
        $this->emit('myComponentUpdated');
    }
    
    public function addImagen(){
        $this->imagenes[] = null;
        $this->links[] = null;
    }

    public function removeImagen($key){
        unset($this->imagenes[$key]);
        unset($this->links[$key]);
    }

    public function removeImagenElegida($key){
        unset($this->imagenes_elegidas[$key]);
        unset($this->links_elegidos[$key]);
    }

    public function addVideo(){
        $this->video = true;
        foreach ($this->imagenes as $key => $imagen){
            unset($this->imagenes[$key]);
            unset($this->links[$key]);
        }
    }

    public function removeVideo(){
        $this->video = false;
        $this->link_video = null;
        $this->duracion_video = "00:30";
    }

    //GUARDADO DE CAMBIOS EN BD
    public function editarPublicacion(){
        $keys = array_keys($this->imagenes);

        //REGLAS VALIDACIÓN
        $reglas = [
            'titulo' => 'required|max:100',
            'texto_editar' => 'max:4000',
            'imagenes.*' => 'required_with:links.*|image',
            'duracion_video' => 'required|before_or_equal:05:00:00|after_or_equal:00:10:00',
        ];

        if(!($this->video) && empty(array_filter($this->imagenes))){
            $reglas['texto_editar'] = 'required|max:4000';
        }elseif (!($this->video)){
            $reglas['texto_editar'] = 'max:4000';
        } elseif ($this->video){
            $reglas['link_video'] = 'required';
        }

        $errores = $this->validate($reglas);


        DB::beginTransaction();
        try {
            //CAMBIO DATOS PUBLICACIÓN
            $this->publicacion_elegida->titulo = $this->titulo;
            $this->publicacion_elegida->texto = $this->texto_editar;
            $this->publicacion_elegida->save();

            //CAMBIO DE VIDEO
            if ($this->video){
                //BORRADO IMÁGENES-VIDEO EN CASO DE TENER
                foreach($this->publicacion_elegida->imagenes as $imagen){
                    if ($imagen->imagen != null){
                        Storage::delete($imagen->imagen);
                    }
                    Imagen::where('id', $imagen->id)->delete();
                }
                //FORMATEO DE DATOS
                $tiempo_separado = explode(':', $this->duracion_video); 
                $tiempo_total = ($tiempo_separado[0]*60 + $tiempo_separado[1]).'000';
                if ((substr($this->link_video, -11) != '&download=1')){
                    $this->link_video = $this->link_video.'&download=1';
                }
                //GUARDADO EN BD
                Imagen::insert([
                    'imagen' => null,
                    'posts_id' => $this->publicacion_elegida->id,
                    'link' => $this->link_video,
                    'duracion' => $tiempo_total,
                ]);
            //CAMBIO DE IMÁGENES
            } else {
                //BORRADO VIDEO
                foreach ($this->publicacion_elegida->imagenes as $imagen){
                    if ($imagen->imagen == null){
                        Imagen::where('id', $imagen->id)->delete();
                    }
                }
                if ($this->imagenes_elegidas != null){
                    //MEZCLA ARRAY IMÁGENES
                    foreach ($this->imagenes_elegidas as $key => $imagen){
                        if ($imagen){
                                $this->imagenes[] = $imagen;
                                $this->links[] = $this->links_elegidos[$key];
                        }
                    }
                    //BORRADO IMÁGENES ANTIGUAS SI NO ESTAN EN ARRAY
                    foreach($this->publicacion_elegida->imagenes as $imagen){
                        Imagen::where('id', $imagen->id)->delete();
                        if (!(in_array($imagen->imagen, $this->imagenes))){
                            Storage::delete($imagen->imagen);
                        }
                    }
                }
                if ($this->imagenes != null){
                    foreach ($this->imagenes as $key => $imagen){
                        if ($imagen){
                            //GUARDADO DE IMAGEN EN DISCO Y BD
                            if (gettype($imagen) != "string"){
                                $ruta_archivo = $imagen->store('img');
                                $link = $this->links[$key];
                                Imagen::insert([
                                    'imagen' => $ruta_archivo,
                                    'posts_id' => $this->publicacion_elegida->id,
                                    'link' => $link,
                                ]);
                            //SI ES IMAGEN "ANTIGUA" SE GUARDAN LOS DATOS EN BD SOLAMENTE
                            } else {
                                $link = $this->links[$key];
                                Imagen::insert([
                                    'imagen' => $imagen,
                                    'posts_id' => $this->publicacion_elegida->id,
                                    'link' => $link,
                                ]);
                            }
                        }
                    }
                }
            }
            DB::commit();
            $this->edit = false;

            $this->flash('success', '', [
                'position' => 'center',
                'timer' => '5000',
                'toast' => false,
                'text' => 'Publicación editada correctamente',
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
                'text' => 'Se ha producido un error al editar los datos, intente nuevamente',
                'timerProgressBar' => false,
            ]);
        }
    }

    public function render(){
        return view('livewire.modals.modal-editar-publicacion');
    }
}