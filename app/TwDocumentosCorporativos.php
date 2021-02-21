<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwDocumentosCorporativos extends Model
{

    protected $table = 'tw_documentos_corporativos';

    protected $fillable = ['id','tw_corporativos_id', 'tw_documentos_id'];

    public $timestamps = false;
}
