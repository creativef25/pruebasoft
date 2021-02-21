<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TwCorporativos;

class AccionesController extends Controller
{
    public function corporativoInfo($id){
      $corp = TwCorporativos::find($id);
      $corporativo['corporativo'] = $corp;
      $corporativo['corporativo']['tw_empresas_corporativo'] = $corp->TwEmpresasCorporativos;

      return response(['data' => $corporativo]);
    }
}
