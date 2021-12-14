<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;

class UsuWeb extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    protected $table = "UsuWeb";
    protected $primaryKey = "usu_cntcuit";
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    
    public function getContribuyente()
    {
       return $this->belongsTo(Contribu::class, 'usu_cntcuit', 'cntcuit');
    }

    public function getAplicacionesHabilitadas()
    {
        return $this->hasMany(PermxAplicacion::class, 'usu_cntcuit', 'pcuit');    
    }
        /*//Relaciones
    public function establecimientos()
    {
        return $this->belongsToMany('App\Establecimiento', 'Trabaja', 'IdPersona', 'IdEstablecimiento')
        ->distinct('IdEstablecimiento');
    }

    public function establecimientosHabilitados()
    {
        return $this->establecimientos()->wherePivot('Estado', 1);
    }
    */

    public function updateLastSession()
    {
        $this->usu_sessionactiva = 1;
        $this->usu_idsesion = session()->getId();
        //$fecha = strtotime(Carbon::now()->format('Y/m/d H:i:s'));
        $this->usu_estadofec = Carbon::now()->format('Y/m/d H:i:s');
        
        $this->save();
    }

    public function cleanLastSession()
    {
        $this->usu_sessionactiva = 0;
        $this->usu_idsesion = null;
        $this->save();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->usu_cntpass;
    }
}
