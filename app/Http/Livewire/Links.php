<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link;

class Links extends Component
{
    public $links_ingresados;

    public function mount(){
        $this->links_ingresados = Link::all();
    }

    public function render(){
        return view('livewire.links');
    }
}
