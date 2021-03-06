<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwContactosCorporativos extends Model
{
    protected $table = "tw_contactos_corporativos";

    public $timestamps = false;

    protected $fillable = [
      'id', 'S_Nombre', 'S_Puesto', 'S_Comentarios', 'N_TelefonoFijo', 'N_TelefonoMovil',
      'S_Email', 'tw_corporativos_id'
    ];

    public function twCorporativos(){
      return $this->belongsTo('App\TwCorporativos');
    }
}
