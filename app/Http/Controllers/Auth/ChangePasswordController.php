<?php

   


namespace App\Http\Controllers\Auth;

   

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UsuWeb;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

   

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {

        return view('auth.passwords.changePassword');

    } 

   

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function store(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

        
        $CntCuit = Session::get('idContribu');
        $user = UsuWeb::where('usu_cntcuit', '=', $CntCuit)->first();
        $user->usu_cntpass = md5($request->new_password);
        $user->save();

   

        dd('Password change successfully.');

    }

}