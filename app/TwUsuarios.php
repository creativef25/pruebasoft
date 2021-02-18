<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class TwUsuarios extends Model
{

    use SoftDeletes;

    protected $table = "tw_usuarios";

    protected $dates = ['deleted_at'];

    protected $fillable = [
      'id', 'username', 'email', 'S_Nombre', 'S_Apellidos', 'S_FotoPerfilUrl',
      'S_Activo', 'password', 'verification_token', 'verified', 'created_at',
      'updated_at', 'deleted_at'
    ];

    public function twCorporativos(){
      return $this->hasMany('App\TwCorporativos');
    }
}
