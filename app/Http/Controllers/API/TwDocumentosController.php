<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\TwDocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProjectResource;

class TwDocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $docu = TwDocumentos::all();
      return response(['usuarios' => ProjectResource::collection($docu), 'mensaje' => 'Exitoso'], 200);
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
     * @param  \App\TwDocumentos  $twDocumentos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $docu = TwDocumentos::find($id);

      if (is_null($docu)) {
            return $this->sendError('Usuario no encontrado.');
        }


        return response(['usuarios' => new ProjectResource($docu), 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwDocumentos  $twDocumentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TwDocumentos $twDocumentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TwDocumentos  $twDocumentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      TwDocumentos::find($id)->delete();
      return response(['message' => 'Eliminado']);
    }
}
