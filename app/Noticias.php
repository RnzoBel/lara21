<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Noticias extends Model
{
    use HasApiTokens, Notifiable;
    
    protected $table = "NOTICIAS";
    protected $primaryKey = "NOTICIASID";
   
    public $timestamps = false;

    
    
}
