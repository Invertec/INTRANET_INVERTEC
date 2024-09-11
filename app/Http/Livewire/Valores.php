<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
class Valores extends Component
{
    public $uf, $utm, $dolar, $euro;
    public function mount(){
        //DATOS DE API
        $valores = Http::withHeaders([
            'Accept' => '*/*',
        ])->get('https://mindicador.cl/api/')->json();

        $this->uf = $valores['uf']['valor'];
        $this->utm = $valores['utm']['valor'];
        $this->dolar = $valores['dolar']['valor'];
        $this->euro = $valores['euro']['valor'];
    }

    public function render(){
        return view('livewire.valores');
    }
}