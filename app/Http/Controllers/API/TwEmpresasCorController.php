<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TwEmpresasCorporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;

class TwEmpresasCorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empre_cor = TwEmpresasCorporativos::all();
        return response(['empresa_corporativos' => $empre_cor, 'mensaje' => 'Exitoso'], 200);
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
          'S_RazonSocial' => 'required|string|size:150',
          'S_RFC' => 'required|string|size:13',
          'S_Activo' => 'required|boolean|size:1',
          'tw_corporativos_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
          return response(['error' => $validator->errors(), 'Error de Validacion']);
        }

        $tw_empre_corpo = TwEmpresasCorporativos::create($request->all());
        return response(['empresa_corporativos' => $tw_empre_corpo, 'message' => 'Creacion Exitosa'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TwEmpresasCorporativos  $twEmpresasCorporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empre_cor = TwEmpresasCorporativos::find($id);

        if (is_null($empre_cor)) {
              return $this->sendError('Usuario no encontrado.');
          }


          return response(['empresa_corporativos' => $empre_cor, 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwEmpresasCorporativos  $twEmpresasCorporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'S_RazonSocial' => 'required|string|size:150',
        'S_RFC' => 'required|string|size:13',
        'S_Activo' => 'required|boolean|size:1',
        'tw_corporativos_id' => 'required|integer'
      ]);

      if ($validator->fails()) {
        return response(['error' => $validator->errors(), 'Error de Validacion']);
      } else {
        $tw_empre_corpo = TwEmpresasCorporativos::whereId($id)->update([
                                                                        'S_RazonSocial' => $request->S_RazonSocial,
                                                                        'S_RFC' => $request->S_RFC,
                                                                        'S_Activo' => $request->S_Activo,
                                                                        'tw_corporativos_id' => $request->tw_corporativos_id
                                                                      ]);
        return response(['message' => 'Actualizacion Exitosa'], 201);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TwEmpresasCorporativos  $twEmpresasCorporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      TwEmpresasCorporativos::find($id)->delete();
      return response(['message' => 'Eliminado']);
    }
}
