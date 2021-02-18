<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwContratosCorporativos extends Model
{
    protected $table = "tw_contratos_corporativos";

    protected $fillable = [
      'id', 'D_FechaInicio', 'D_FechaFin', 'S_URLContrato','tw_corporativos_id'
    ];

    public function twCorporativos(){
      return $this->belongsTo('App\TwCorporativos');
    }
}
