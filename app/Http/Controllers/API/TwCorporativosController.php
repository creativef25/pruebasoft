<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TwCorporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;

class TwCorporativosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corpo = TwCorporativos::all();
        return response(['corporativo' => $corpo, 'mensaje' => 'Exitoso'], 200);
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
          'S_NombreCorto' => 'required|string|size:45',
          'S_NombreCompleto' => 'required|string|size:75',
          'S_DBName' => 'required|string|size:45',
          'S_DBUsuario' => 'required|string|size:45',
          'S_DBPassword' => 'required|password|size:150',
          'S_SystemUrl' => 'required|string|size:255',
          'S_Activo' => 'required|boolean|size:1',
          'D_FechaIncorporacion' => 'required',
          'tw_usuarios_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
          return response(['error' => $validator->errors(), 'Error de Validacion']);
        }

        $corpo =  TwCorporativos::create($request->all());
        return response(['corporativos' => $corpo, 'message' => 'Creacion Exitosa'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TwCorporativos  $twCorporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corpo = TwCorporativos::find($id);

        if (is_null($corpo)) {
              return $this->sendError('Usuario no encontrado.');
          }

          return response(['corporativos' => $corpo, 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwCorporativos  $twCorporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'S_NombreCorto' => 'required|string|size:45',
        'S_NombreCompleto' => 'required|string|size:75',
        'S_DBName' => 'required|string|size:45',
        'S_DBUsuario' => 'required|string|size:45',
        'S_DBPassword' => 'required|password|size:150',
        'S_SystemUrl' => 'required|string|size:255',
        'S_Activo' => 'required|boolean|size:1',
        'D_FechaIncorporacion' => 'required',
        'tw_usuarios_id' => 'required|integer'
      ]);

      if ($validator->fails()) {
        return response(['error' => $validator->errors(), 'Error de Validacion']);
      }else {
        $corpo = TwCorporativos::whereId($id)->update([
                                                        'S_NombreCorto' => $request->S_NombreCorto,
                                                        'S_NombreCompleto' => $request->S_NombreCompleto,
                                                        'S_DBName' => $request->S_DBName,
                                                        'S_DBUsuario' => $request->S_DBUsuario,
                                                        'S_DBPassword' => $request->S_DBPassword,
                                                        'S_SystemUrl' => $request->S_SystemUrl,
                                                        'S_Activo' => $request->S_Activo,
                                                        'D_FechaIncorporacion' => $request->D_FechaIncorporacion,
                                                        'tw_usuarios_id' => $request->tw_usuarios_id
                                                      ]);
        return response(['message' => 'Actualizacion Exitosa'], 201);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TwCorporativos  $twCorporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TwCorporativos::find($id)->delete();
        return response(['message' => 'Eliminado']);
    }
}
