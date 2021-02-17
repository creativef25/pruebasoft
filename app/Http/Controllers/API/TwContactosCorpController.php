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
      return response(['usuarios' => ProjectResource::collection($contac_corp), 'mensaje' => 'Exitoso'], 200);
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
     * @param  \App\TwContactosCorporativos  $twContactosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $contac_corp = TwContactosCorporativos::find($id);

      if (is_null($contac_corp)) {
            return $this->sendError('Usuario no encontrado.');
        }


        return response(['usuarios' => new ProjectResource($contac_corp), 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwContactosCorporativos  $twContactosCorporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TwContactosCorporativos $twContactosCorporativos)
    {
        //
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
