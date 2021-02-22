<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TwCorporativos;
use App\TwDocumentos;

class AccionesController extends Controller
{
    public function corporativoInfo($id){
      $corp = TwCorporativos::whereId($id)->with([
                                                  'twEmpresasCorporativos',
                                                  'twContactosCorporativos',
                                                  'twContratosCorporativos',
                                                  'twDocumentos'
                                                 ])->get();
      return response(['data' => $corp, 'message' => 'Extraido Exitosamente'], 200);
    }

    public function documentoInfo($id){
      $docu = TwDocumentos::whereId($id)->with([
                                              'twCorporativos'
                                            ])->get();

      return response(['data' => $docu]);
    }
}
