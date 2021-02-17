<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class TwCorporativos extends Model
{

    use SoftDeletes;

    protected $table = "tw_corporativos";

    protected $dates = ['deleted_at'];

    protected $fillable = [
      'id', 'S_NombreCorto', 'S_NombreCompleto', 'S_LogoUrl', 'S_DBName',
      'S_DBUsuario', 'S_DBPassword', 'S_SystemUrl', 'S_Activo', 'D_FechaIncorporacion',
      'created_at', 'updated_at', 'deleted_at', 'tw_usuarios_id'
    ];

    public function twUsuario(){
      return $this->belongsTo('App\TwUsuarios');
    }

    public function twEmpreCorp(){
      return $this->hasMany('App\TwEmpresasCorporativos');
    }

    public function twContCorp(){
      return $this->hasMany('App\TwContactosCorporativos');
    }

    public function twContraCorp(){
      return $this->hasMany('App\TwContratosCorporativos');
    }

    public function twDocu(){
      return $this->belongsToMany('App\TwDocumentos', 'tw_documentos_corporativos');
    }
}
