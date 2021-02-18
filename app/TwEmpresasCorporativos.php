<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class TwEmpresasCorporativos extends Model
{

    use SoftDeletes;

    protected $table = 'tw_empresas_corporativos';

    protected $dates = ['deleted_at'];

    protected $fillable = [
      'id', 'S_RazonSocial', 'S_RFC', 'S_Pais', 'S_Estado', 'S_Municipio', 'S_ColoniaLocalidad',
      'S_Domicilio', 'S_CodigoPostal', 'S_UsoCFDI', 'S_UrlRFC', 'S_UrlActaConstitutiva', 'S_Activo',
      'S_Comentarios', 'tw_corporativos_id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function twCorporativos(){
      return $this->belongsTo('App\TwCorporativos');
    }
}
