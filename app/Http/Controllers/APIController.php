<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function getApiData(){
        $datos = array();
        $mes = '04';
        $empleados = Http::withHeaders([
            'auth_token' => 'i7hPyJKp5GbHkeVyxBpuCFfj',
            'Accept' => '*/*',
    ])->get('https://invertec.buk.cl/api/v1/chile/employees/active?page_size=50')->json();

        for ($page = 1; $page <= $empleados['pagination']['total_pages']; $page++){
            foreach($empleados['data'] as $empleado){
                if (substr($empleado['birthday'], 5, 2) == $mes ){
                    $datos_empleado = [$empleado['first_name'], $empleado['surname'], $empleado['birthday'], $empleado['picture_url']];
                    array_push($datos, $datos_empleado);
                }
            }
            $empleados = Http::withHeaders([
                'auth_token' => 'i7hPyJKp5GbHkeVyxBpuCFfj',
                'Accept' => '*/*',
        ])->get('https://invertec.buk.cl/api/v1/chile/employees/active?page='.$page.'&page_size=50?')->json();
        }

        dd($datos);
        return view('main', compact('empleados'));
    }
}