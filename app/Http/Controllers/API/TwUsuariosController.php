<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TwUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;

class TwUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = TwUsuarios::all();
        return response(['usuarios' => ProjectResource::collection($usuarios), 'mensaje' => 'Exitoso'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = $request->all();

        $validator = Validator::make($data,[
          'username' => 'required',
          'email' => 'email|required',
          'S_Activo' => 'required',
          'password' => 'required',
          'verified' => 'required'
        ]);

        if ($validator->fails()) {
          return response(['error' => $validator->errors(), 'Error de Validacion']);
        }

        $usuarios = TwUsuarios::create($data);
        return response(['usuarios' => new ProjectResource($usuarios), 'message' => 'Creacion Exitosa'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TwUsuarios  $twUsuarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $usuario = TwUsuarios::find($id);

      if (is_null($usuario)) {
            return $this->sendError('Usuario no encontrado.');
        }


        return response(['usuarios' => new ProjectResource($usuario), 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwUsuarios  $twUsuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(),[
        'username' => 'required',
        'email' => 'email|required',
        'S_Activo' => 'required',
        'password' => 'required',
        'verified' => 'required'
      ]);

      if ($validator->fails()) {
        return response(['error' => $validator->errors(), 'Error de Validacion']);
      } else {
        $usuarios = TwUsuarios::whereId($id)->update([
                                           'username' => $request->username,
                                           'email' => $request->email,
                                           'S_Activo' => $request->S_Activo,
                                           'password' => $request->password,
                                           'verified' => $request->verified
                                         ]);

        return response(['message' => 'Actualizacion Exitosa'], 201);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TwUsuarios  $twUsuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TwUsuarios::find($id)->delete();
        return response(['message' => 'Eliminado']);
    }
}
