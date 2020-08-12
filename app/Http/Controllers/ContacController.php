<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Contac;


class ContacController extends Controller
{
    public function getContacs(request $request)
    {    
        $contacs = Contac::all() ;
           
   
        return response()->json = [
            'code' => 200,
            'status' => 'Success',
            'data' => $contacs,
         
        ];
    }
    public function createContac(request $request)
    {
        
        //recoger los datos por post
        $json = $request->input('json', null);
        $params = json_decode($json, true);
        
      

        //dd($json);
      
        
       
        //conseguir usuario identificado
        if (!empty($params)) {



            //validar datos
            $validate = \Validator::make($params, [
                'name' => 'required|max:50',
                'state' => 'required|max:30',
                'email' => 'required|max:30',
                'city' => 'required|max:50',

            ]);


            if ($validate->fails()) {

                $data = [
                    'code' => 200,
                    'status' => 'Error',
                    'message' => 'Datos requeridos'
                ];
            } else {
                //guardar articulo
                $createContac = new Contac();
                $createContac->name = $params['name'];
                $createContac->state = $params['state'];
                $createContac->email = $params['email'];
                $createContac->city = $params['city'];
                    //guardar la la imagen
                 
               $createContac->save();
               

                $data = [
                    'code' => 200,
                    'status' => 'Success',
                    'message' => 'Tu información ha sido recibida satisfactoriamente',
                   
                ];
            }
        } else {

            $data = [
                'code' => 200,
                'status' => 'Error',
                'messsage' => 'Datos enviados erroneamente'
            ];
        }

        //devolver respuesta
        return response()->json($data, $data['code']);
    }
}