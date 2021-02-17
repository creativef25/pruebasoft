<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TwContratosCorporativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;

class TwContratosCorpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contra_corp = TwContratosCorporativos::all();
      return response(['usuarios' => ProjectResource::collection($contra_corp), 'mensaje' => 'Exitoso'], 200);
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
     * @param  \App\TwContratosCorporativos  $twContratosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $contra_corp = TwContratosCorporativos::find($id);

      if (is_null($contra_corp)) {
            return $this->sendError('Usuario no encontrado.');
        }


        return response(['usuarios' => new ProjectResource($contra_corp), 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwContratosCorporativos  $twContratosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TwContratosCorporativos $twContratosCorporativos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TwContratosCorporativos  $twContratosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      TwContratosCorporativos::find($id)->delete();
      return response(['message' => 'Eliminado']);
    }
}
