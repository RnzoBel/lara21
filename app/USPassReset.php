<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class USPassReset extends Model
{
   // use HasApiTokens, Notifiable;
    
    protected $table = "USPassReset";
    protected $primaryKey = "US_Cntcuit";
    public $timestamps = false;

    
    
}