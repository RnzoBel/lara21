<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class UsuApps extends Model
{
   // use HasApiTokens, Notifiable;
    
    protected $table = "UsuApps";
    protected $primaryKey = "IdAplicacion";
    public $timestamps = false;

    public function getAgregada(){
        return $this->hasMany(PermxAplicacion::class, 'IdAplicacion', 'idaplicacion'); 
    }
    
}