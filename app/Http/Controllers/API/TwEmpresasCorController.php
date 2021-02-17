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
        return response(['usuarios' => ProjectResource::collection($empre_cor), 'mensaje' => 'Exitoso'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


          return response(['usuarios' => new ProjectResource($empre_cor), 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwEmpresasCorporativos  $twEmpresasCorporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TwEmpresasCorporativos $twEmpresasCorporativos)
    {
        //
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
