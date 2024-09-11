<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Imagen;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Posts extends Component
{
    public $publicaciones;

    public function mount(){
        $this->publicaciones = Post::orderBy('fecha', 'desc')->get();
    }

    public function render(){
        return view('livewire.posts');
    }
}