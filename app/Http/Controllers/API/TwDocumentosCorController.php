<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TwDocumentosCorporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;

class TwDocumentosCorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $docu_corp = TwDocumentosCorporativos::all();
      return response(['documentos_corporativos' => $docu_corp, 'mensaje' => 'Exitoso'], 200);
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
          'tw_corporativos_id' => 'required',
          'tw_documentos_id' => 'required'
        ]);

        if ($validator->fails()) {
          return response(['error' => $validator->errors(), 'Error de Validacion']);
        }

        $tw_docu_corp = TwDocumentosCorporativos::create($request->all());
        return response(['documentos_corporativos' => $tw_docu_corp, 'message' => 'Creacion Exitosa'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TwDocumentosCorporativos  $twDocumentosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $docu_corp = TwDocumentosCorporativos::find($id);

      if (is_null($docu_corp)) {
            return $this->sendError('Usuario no encontrado.');
        }


        return response(['documentos_corporativos' => $docu_corp, 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwDocumentosCorporativos  $twDocumentosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'tw_corporativos_id' => 'required',
        'tw_documentos_id' => 'required'
      ]);

      if ($validator->fails()) {
        return response(['error' => $validator->errors(), 'Error de Validacion']);
      }else {
        $docu_corp = TwDocumentosCorporativos::whereId($id)->update([
                                                                     'tw_corporativos_id' => $request->tw_corporativos_id,
                                                                     'tw_documentos_id' => $request->tw_documentos_id
                                                                   ]);
        return response(['message' => 'Actualizacion Exitosa'], 201);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TwDocumentosCorporativos  $twDocumentosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      TwDocumentosCorporativos::find($id)->delete();
      return response(['message' => 'Eliminado']);
    }
}
