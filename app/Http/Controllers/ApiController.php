<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Usuario;
use App\Contribu;
use App\UsuWeb;

class ApiController extends Controller
{
    

    

    public function sesionActual(UsuWeb $usuario, $idSesion)
    {
        $response = [];
        if ($usuario->usu_idsesion != $idSesion) {
            $response["response"] = false;
        } else {
            $response["response"] = true;
        }

        return $response;
    }
}
