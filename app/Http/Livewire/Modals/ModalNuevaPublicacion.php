<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;
use App\Models\Post;
use App\Models\Imagen;
use DateTime;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;


class ModalNuevaPublicacion extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $show, $video;
    public $titulo, $texto, $link_video, $duracion_video;
    public $imagenes = [];
    public $links = [];

    protected $listeners = ['showModalNuevaPublicacion' => 'showModalNuevaPublicacion'];
    
    public function updatedTexto(){
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

    public function showModalNuevaPublicacion() {
        $this->doShow();
    }

    public function mount() {
        $this->show = false;
        $this->video = false;
        $this->duracion_video = "00:30";
    }

    public function doShow() {
        $this->show = true;
        $this->video = false;
    }

    public function doClose() {
        //INPUTS A DEFAULT
        $this->show = false;
        $this->video = false;
        $this->titulo = null;
        $this->texto = null;
        foreach ($this->imagenes as $key => $imagen){
            unset($this->imagenes[$key]);
            unset($this->links[$key]);
        }
        $this->link_video = null;
        $this->duracion_video = "00:30";
        $this->emit('modalClosed');
    }

    public function agregarPublicacion(){
        //REGLAS VALIDACIÓN
        $reglas = [
            'titulo' => 'required|max:100',
            'texto' => 'max:4000',
            'imagenes.*' => 'required_with:links.*|image',
            'duracion_video' => 'required|before_or_equal:05:00:00|after_or_equal:00:10:00',
        ];

        if(!($this->video) && empty(array_filter($this->imagenes))){
            $reglas['texto'] = 'required|max:4000';
        }elseif (!($this->video)){
            $reglas['texto'] = 'max:4000';
        } elseif ($this->video){
            $reglas['link_video'] = 'required';
        }

        $errores = $this->validate($reglas);

        $fecha = new DateTime();
        DB::beginTransaction();
        try {
            //GUARDADO DATOS PUBLICACIÓN
            $publicacion_id = Post::insertGetId([
                'titulo' => $this->titulo,
                'fecha' => $fecha,
                'texto' => $this->texto,
                ]);
            
            if ($this->video){
                //FORMATEO DATOS VIDEO
                $tiempo_separado = explode(':', $this->duracion_video); 
                $tiempo_total = ($tiempo_separado[0]*60 + $tiempo_separado[1]).'000';

                if ((substr($this->link_video, -11) != '&download=1')){
                    $this->link_video = $this->link_video.'&download=1';
                }
                //GUARDADO VIDEO
                Imagen::insert([
                    'imagen' => null,
                    'posts_id' => $publicacion_id,
                    'link' => $this->link_video,
                    'duracion' => $tiempo_total,
                ]);
            } else {
                //GUARDADO IMÁGENES EN DD Y BD
                if ($this->imagenes != null){
                    foreach ($this->imagenes as $key => $imagen){
                        if ($imagen){
                            $ruta_archivo = $imagen->store('img');
                            $link = $this->links[$key];
                            Imagen::insert([
                                'imagen' => $ruta_archivo,
                                'posts_id' => $publicacion_id,
                                'link' => $link,
                            ]);
                        }
                    }
                }
            }
            //CONFIRMACIÓN CAMBIOS
            DB::commit();
            //REDIRECCIÓN Y MENSAJE
            $this->flash('success', '', [
                'position' => 'center',
                'timer' => '5000',
                'toast' => false,
                'text' => 'Publicación ingresada correctamente',
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
                'text' => 'Se ha producido un error al ingresar la publicación, intente nuevamente',
                'timerProgressBar' => false,
            ]);
        }
    }

    public function render(){
        return view('livewire.modals.modal-nueva-publicacion');
    }
}