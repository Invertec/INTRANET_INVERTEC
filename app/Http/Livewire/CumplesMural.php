<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CumplesMural extends Component
{
    public $datos = array();
    public $mes_nombre, $dia;
    public $cant = 0;

    public $readyToLoad = false;
 
    public function loadCumples(){
        $mes = date('m');
        $dia = date('d');
        $creado = date('Y-m-d');
        //SE COMPRUEBA SI EL ARCHIVO EXISTE Y SE EXTRAE SU FECHA DE MODIFICACIÓN
        if (Storage::disk('local')->get('cumples.txt')){
            $creado = date('Y-m-d', Storage::disk('local')->lastModified('cumples.txt'));
        }
        //SI EL ARCHIVO FUE CREADO EL MES PASADO O HACE MÁS DE 5 DIAS, SE EXTRAEN DATOS DE LA API
        if (substr($creado, 5, 2) - $mes != 0 || $dia - substr($creado, 8, 2) >= 5){
            $this->getApiData();
            usort($this->datos, fn ($a, $b) => $a[1] - $b[1]);
            Storage::disk('local')->put('cumples.txt', json_encode($this->datos));
            $this->readyToLoad = true;
        //SI EL ARCHIVO ES RECIENTE, SE LEE DIRECTAMENTE
        } else{
            $cumples_txt = Storage::disk('local')->get('cumples.txt');
            $cumples_txt = json_decode($cumples_txt);
            foreach ($cumples_txt as $persona){
                array_push($this->datos, $persona);
            }
        }
        
    }
    //DATOS DE CUMPLEAÑOS DESDE API
    public function getApiData(){
            //TIEMPO LIMITE DE TRANSACCION (SEGUNDOS)
        set_time_limit(300);
        //MES ACTUAL
        $mes = date('m');
        //PRIMERA PÁGINA DE DATOS
        $empleados = Http::withHeaders([
            'auth_token' => 'i7hPyJKp5GbHkeVyxBpuCFfj',
            'Accept' => '*/*',
        ])->get('https://invertec.buk.cl/api/v1/chile/employees/active?page_size=40')->json();
        //LOOP PARA CADA PÁGINA
        for ($page = 2; $page <= $empleados['pagination']['total_pages']; $page++){
            foreach($empleados['data'] as $empleado){
                //FILTRO POR MES ACTUAL Y GUARDADO EN VARIABLE LOCAL
                if (substr($empleado['birthday'], 5, 2) == $mes ){
                    $datos_empleado = [strtok($empleado['first_name'], ' ').' '.$empleado['surname'], substr($empleado['birthday'], 8), $empleado['picture_url']];
                    array_push($this->datos, $datos_empleado);
                }
            }
                //PÁGINA SIGUIENTE
                $empleados = Http::withHeaders([
                'auth_token' => 'i7hPyJKp5GbHkeVyxBpuCFfj',
                'Accept' => '*/*',
            ])->get('https://invertec.buk.cl/api/v1/chile/employees/active?page='.$page.'&page_size=40')->json();
        }
    }

    public function render(){
        //MES Y DIA ACTUALES
        $this->mes_nombre = date('m');
        $this->dia = date('d');
        //NOMBRE MES ACTUAL
        switch ($this->mes_nombre) {
            case "01":
                $this->mes_nombre = 'enero';
                break;
            case "02":
                $this->mes_nombre = 'febrero';
                break;
            case "03":
                $this->mes_nombre = 'marzo';
                break;
            case "04":
                $this->mes_nombre = 'abril';
                break;
            case "05":
                $this->mes_nombre = 'mayo';
                break;
            case "06":
                $this->mes_nombre = 'junio';
                break;
            case "07":
                $this->mes_nombre = 'julio';
                break;
            case "08":
                $this->mes_nombre = 'agosto';
                break;
            case "09":
                $this->mes_nombre = 'septiembre';
                break;
            case "10":
                $this->mes_nombre = 'octubre';
                break;
            case "11":
                $this->mes_nombre = 'noviembre';
                break;
            case "12":
                $this->mes_nombre = 'diciembre';
                break;
        }
        return view('livewire.cumples-mural');
    }
}
