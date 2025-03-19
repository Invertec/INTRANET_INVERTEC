<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Valores extends Component
{
    public $uf, $utm, $dolar, $euro;

    public function mount(){
        // Intentar obtener los valores de la API con un tiempo de espera de 5 segundos
        try {
            $response = Http::withHeaders([
                'Accept' => '*/*',
            ])->timeout(5)->get('https://mindicador.cl/api/');

            if ($response->successful()) {
                $valores = $response->json();

                // Guardar los valores en caché
                Cache::put('uf', $valores['uf']['valor'], now()->addMinutes(10));
                Cache::put('utm', $valores['utm']['valor'], now()->addMinutes(10));
                Cache::put('dolar', $valores['dolar']['valor'], now()->addMinutes(10));
                Cache::put('euro', $valores['euro']['valor'], now()->addMinutes(10));

                // Asignar los valores a las propiedades
                $this->uf = $valores['uf']['valor'];
                $this->utm = $valores['utm']['valor'];
                $this->dolar = $valores['dolar']['valor'];
                $this->euro = $valores['euro']['valor'];
            } else {
                // Usar los valores en caché si la respuesta no es exitosa
                $this->useCachedValues();
            }
        } catch (\Exception $e) {
            // Usar los valores en caché si hay una excepción (por ejemplo, tiempo de espera agotado)
            $this->useCachedValues();
        }
    }

    private function useCachedValues() {
        $this->uf = Cache::get('uf', 'Valor no disponible');
        $this->utm = Cache::get('utm', 'Valor no disponible');
        $this->dolar = Cache::get('dolar', 'Valor no disponible');
        $this->euro = Cache::get('euro', 'Valor no disponible');
    }

    public function render(){
        return view('livewire.valores');
    }
}
