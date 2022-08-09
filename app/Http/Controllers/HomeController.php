<?php

namespace App\Http\Controllers;

use App\UsuWeb;
use App\Contribu;
use App\Contribuyente;
use App\UsuApps;
use App\Noticias;
use Illuminate\Auth;
use App\Notifications\Notifications;
use App\Permxaplicacion;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Contribu = session('idContribu');
       
       /*
        $permisos = DB::table('PermxAplicacion')->select('idaplicacion')
        ->where([
             ['Pcuit', $Contribu],
             ['Estado', 1]
        ])->get();*/
        $permisos = PermxAplicacion::where('Pcuit', '=', $Contribu)
        ->where('Estado', '=', 1)
        ->get();
          //  return($permisos->aplica->appnombre);
          //return($permisos);
          
        $aplicaciones = UsuApps::paginate(2);
        $aplicacion = UsuApps::find(7);
        //return dd($aplicacion->getAgregada->Estado);
        //$apps = Permxaplicacion::find()

        //return dd($aplicaciones);
        return view('home', compact('aplicaciones', 'permisos'));
       //$Contribuyente = UsuWeb::find('20336144087');
      // $users = DB::table('CONTRIBU')->select('CntCuit');
       //$users = DB::table('CONTRIBU')->where('CntCuit', '20336144087')->first();
       // return dd($Contribuyente->getContribuyente->cntnombre);
        //return view('home', compact('UsuWebs'));
    }

    public function showsapp(){
        $CntCuit = session()->get('idContribu');
        $users = Usuweb::where('Usu_CntCuit', $CntCuit)->first();
            if (is_null($users->usu_sglevel) || ($users->usu_sglevel < 9)){
                $aplicaciones = UsuApps::where('AppEstado', 1)->get();
            } else{ 
                $aplicaciones = UsuApps::all();
        }
        //return $aplicaciones;
    

       
        return view('apps', compact('aplicaciones'));
    }

    public function ordenanzas()
    {
        
        return redirect::to('https://resistencia.gob.ar/ordenanzas-municipales/');
    }

    public function boem()
    {
        return redirect::to('https://resistencia.gob.ar/boem-boletin-oficial-municipal/');
    }


    public function setAppUsu(UsuApps $app)
    {
        
        $Contribu = session('idContribu');
        //$permisos = PermxAplicacion::where('Pcuit', '=', $Contribu);
        $permisos = PermxAplicacion::where('Pcuit', '=', $Contribu)
        ->where('Estado', '=', 1)
        ->where('idaplicacion', '=', $app->idaplicacion)
        ->get();
        //si no existe la agrego
        if ($permisos->count() == 0) {
            $PermisosxAplicacionAgregar = new PermxAplicacion;
            $PermisosxAplicacionAgregar->IdAplicacion =  $app->idaplicacion;
            $PermisosxAplicacionAgregar->Estado = 1;
            $PermisosxAplicacionAgregar->Pcuit = $Contribu;
            $PermisosxAplicacionAgregar->save();
        }

        
        return redirect()->back()->with('success', 'Aplicacion agregada correctamente');   
        
       
       // return($app->idaplicacion);
        
        
        //return view('home');
       $aplicaciones = UsuApps::all();
       //return dd($aplicaciones);
      // $users = DB::table('CONTRIBU')->select('CntCuit');
       //$users = DB::table('CONTRIBU')->where('CntCuit', '20336144087')->first();
       // return dd($Contribuyente->getContribuyente->cntnombre);
        //return view('home', compact('UsuWebs'));
    }

    /*public function showapps()
    {
       $users = DB::table('CONTRIBU')->where('CntCuit', '20336144087')->first();
        return dd($users);
       $aplicaciones = UsuApps::all();
       return dd($aplicaciones);
      // $users = DB::table('CONTRIBU')->select('CntCuit');
       //$users = DB::table('CONTRIBU')->where('CntCuit', '20336144087')->first();
       // return dd($Contribuyente->getContribuyente->cntnombre);
        //return view('home', compact('UsuWebs'));
    }*/

    public function phones()
    {
       
      return view('phones');
    }

    public function setTrabajaServyApp($idAplicacion)
    {
        
            
            $data = [
                'idContribu' => session('idContribu'),
                //'Contribuyente' => session('Contribuyente'),
                'idAplicacion' => $idAplicacion, 
                'idSesion' => session()->getId()
            ];
       
           return redirect()->away(UsuApps::find($idAplicacion)->callback . '?' . http_build_query($data));
       
        }

     
}
