<?php

namespace App\Http\Controllers;

use App\USPassReset;
use App\UsuWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
//use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function validatePasswordRequest(Request $request)
    {
        
        
        //You can add validation login here
        $user = UsuWeb::where('usu_cntcuit', '=', $request->usu_cntcuit)->first();
        //return dd($user);
        
        //return dd($user->getContribuyente->cntnombre);

        if (is_null($user) || ($user->count() == 0)) {
            return redirect()->back()->withErrors(['usu_cntcuit' => trans('Usuario no registrado')]);
        }
        
        $tokenOld = USPassReset::find($request->usu_cntcuit);

        if(is_null($tokenOld)){
        //Create Password Reset Token
        $resetPass = new USPassReset ;
        $resetPass->us_cntcuit = $request->usu_cntcuit;
        $resetPass->us_cntemail = $user->usu_cntemail;
        $resetPass->usu_token = Str::random(60);
        $resetPass->created_at = Carbon::now()->format('Y/m/d H:i:s');
        $resetPass->save();
        }else{
            return redirect()->back()->with('status', trans('Ya fue enviado el correo.'));
        }
        //Get the token just created above
        $tokenData = USPassReset::where('US_Cntcuit', '=', $user->usu_cntcuit)->first();
        //return dd($tokenData);
        $cuit = $tokenData->us_cntcuit;
        $email = $tokenData->us_cntemail;
        $token = $tokenData->usu_token;
        
        
        if ($this->sendResetEmail($tokenData->us_cntcuit, $tokenData->us_cntemail, $tokenData->usu_token)) {
            return redirect()->back()->with('status', trans('Se ha enviado un correo con el link de reseteo de clave.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('Error de conexion. Por favor intente nuevamente.')]);
        }
        
    }
    
    private function sendResetEmail($us_cntcuit, $us_cntemail, $token)
    {
    //Retrieve the user from the database
       
    $user = UsuWeb::where('usu_cntcuit', '=', $us_cntcuit)->first();
   
    //Generate, the password reset link. The token generated is embedded in the link
    /* 
        $link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->us_cntemail);
        try {
        //Here send the link with CURL with an external email API 
            return true;
        } catch (\Exception $e) {
            return false;
        }
    */
    $data = [
        'cuit' => $us_cntcuit,
        'email' => $us_cntemail,
        'token' => $token
      ];
      try {
      $data = array( 'cuit' => $us_cntcuit, 'email' => $us_cntemail, 'token' => $token);
      \Mail::send('auth.recupera', $data, function($msg) use($us_cntemail){
         $msg->from('sistemas@muniresistencia.ar', 'Municipalidad de Resistencia');
       $msg->to($us_cntemail)->subject('Ciudad Digital');
      });
      return true;
    } catch (\Exception $e) {
        return false;
    }
      

    }

    public function resetPassword(Request $request)
    {
       // return dd($request);
        //Validate input
        $validator = Validator::make($request->all(), [
            'usu_cntcuit' => 'required',
            'password' => 'required|confirmed',
            'token' => 'required' 
             ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
    // Validate the token
        //$tokenData = DB::table('password_resets')->where('token', $request->token)->first();
        $tokenData = USPassReset::where('usu_token', '=', $request->token )->first();
    // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');
        
        //$user = User::where('email', $tokenData->email)->first();
        $user = UsuWeb::where('usu_cntcuit', '=', $tokenData->us_cntcuit)->first();
       // return dd($user);
    // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['usu_cntcuit' => 'Cuit no valido']);
    //Hash and update the new password
        $user->usu_cntpass = md5($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        $query = USPassReset::where('usu_token', '=', $request->token )->delete();
       // DB::table('password_resets')->where('email', $user->email)
       // ->delete();

        //Send Email Reset Success Email
        if ($query) {
            Auth::logout();
            return view('auth.login');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }

    }

}
