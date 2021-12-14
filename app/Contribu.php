<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Contribu extends Model
{
    use HasApiTokens, Notifiable;
    
    protected $table = "CONTRIBU";
    protected $primaryKey = "CntCuit";
   
    public $timestamps = false;

    
    
}
