<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultasunatController extends Controller
{
    public function buscarRuc(Request $request)
    {
        try{
            if ($request->ajax()) {
                $ruc=$request->get('ruc');
                $ruta = "https://ruc.com.pe/api/beta/ruc";
                $token = "20511061-4ecf-4efd-9310-4a5667d97cbe-5ee15d1f-8c26-4369-9d62-1337b4de8aea";

                $rucaconsultar = $ruc;
                $data = array(
                    "token" => $token,
                    "ruc"   => $rucaconsultar
                );
                    
                $data_json = json_encode($data);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $ruta);
                curl_setopt(
                    $ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    )
                );
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $respuesta  = curl_exec($ch);
                curl_close($ch);

                $leer_respuesta = json_decode($respuesta, true);
                $data=array('entidad' => $leer_respuesta);
                echo json_encode($data);
            }
        }catch (\Exception $e) {
        return back()->with('success', 'Hubo un error al consultar SUNAT, intente de nuevo!');
        }
    }
}
