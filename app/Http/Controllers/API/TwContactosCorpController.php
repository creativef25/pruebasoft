<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TwContactosCorporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;

class TwContactosCorpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contac_corp = TwContactosCorporativos::all();
      return response(['contactos_corporativos' => $contac_corp, 'mensaje' => 'Exitoso'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'S_Nombre' => 'required',
          'S_Puesto' => 'required',
          'S_Email' => 'required',
          'tw_corporativos_id' => 'required',
        ]);

        if ($validator->fails()) {
          return response(['error' => $validator->errors(), 'Error de Validacion']);
        }

        $contac_corp = TwContactosCorporativos::create($request->all());
        return response(['contactos_corporativos' => $contac_corp, 'message' => 'Creacion Exitosa'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TwContactosCorporativos  $twContactosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $contac_corp = TwContactosCorporativos::find($id);

      if (is_null($contac_corp)) {
            return $this->sendError('Usuario no encontrado.');
        }


        return response(['contactos_corporativos' => $contac_corp, 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwContactosCorporativos  $twContactosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'S_Nombre' => 'required',
        'S_Puesto' => 'required',
        'S_Email' => 'required',
        'tw_corporativos_id' => 'required',
      ]);

      if ($validator->fails()) {
        return response(['error' => $validator->errors(), 'Error de Validacion']);
      }else {
        $contac_corp = TwContactosCorporativos::whereId($id)->update([
                                                                      'S_Nombre' => $request->S_Nombre,
                                                                      'S_Puesto' => $request->S_Puesto,
                                                                      'S_Email' => $request->S_Email,
                                                                      'tw_corporativos_id' => $request->tw_corporativos_id
                                                                    ]);
        return response(['message' => 'Actualizacion Exitosa'], 201);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TwContactosCorporativos  $twContactosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      TwContactosCorporativos::find($id)->delete();
      return response(['message' => 'Eliminado']);
    }
}
