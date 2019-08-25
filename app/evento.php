<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evento extends Model
{
    //
    protected $fillable = [
        'nombre','descripcion','fecha','foto','categoria'
    ];
}
