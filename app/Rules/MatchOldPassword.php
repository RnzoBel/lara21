<?php

  

namespace App\Rules;

  

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\UsuWeb;

  

class MatchOldPassword implements Rule

{

    /**

     * Determine if the validation rule passes.

     *

     * @param  string  $attribute

     * @param  mixed  $value

     * @return bool

     */

    public function passes($attribute, $value)

    {
        $CntCuit = Session::get('idContribu');
        $user = UsuWeb::where('usu_cntcuit', '=', $CntCuit)->first();

        if ($user->usu_cntpass == md5($value)){
            return true;
        }else{
                return false;
            }
        }
        //return Hash::check($value, auth()->user()->password);

    

   

    /**

     * Get the validation error message.

     *

     * @return string

     */

    public function message()

    {

        return 'The :attribute is match with old password.';

    }

}
