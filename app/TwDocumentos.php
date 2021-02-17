<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwDocumentos extends Model
{
    protected $table = 'tw_documentos';

    protected $fillable = [
      'id', 'S_Nombre', 'N_Obligatorio', 'S_Descripcion'
    ];

    public function twDocu(){
      return $this->belongsToMany('App\TwCorporativos', 'tw_documentos_corporativos');
    }
}
