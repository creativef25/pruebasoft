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
        return response(['corporativo' => ProjectResource::collection($corpo), 'mensaje' => 'Exitoso'], 200);
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
     * @param  \App\TwCorporativos  $twCorporativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corpo = TwCorporativos::find($id);

        if (is_null($corpo)) {
              return $this->sendError('Usuario no encontrado.');
          }

          return response(['usuarios' => new ProjectResource($corpo), 'message' => 'Extraido Exitosamente'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TwCorporativos  $twCorporativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TwCorporativos $twCorporativos)
    {
        //
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
