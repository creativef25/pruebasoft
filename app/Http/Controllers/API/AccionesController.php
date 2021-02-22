<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TwCorporativos;

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
}
