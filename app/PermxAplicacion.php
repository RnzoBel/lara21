<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Permxaplicacion extends Model
{
   // use HasApiTokens, Notifiable;
    
    protected $table = "USPermxApp";
    protected $primaryKey = "IdPermxApp";
    public $timestamps = false;

 public function getAplicacion()
{
    return $this->belongsTo(UsuApps::class, 'idaplicacion', 'IdAplicacion');
}

public function getPermiso(){
    return $this->belongsTo(UsuWeb:: class, 'Pcuit', 'usu_cntcuit');
}



    
}