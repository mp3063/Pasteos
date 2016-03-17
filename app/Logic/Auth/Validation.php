<?php
namespace App\Logic\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class Validation
{

    public static function register( Request $request )
    {
        $validator = Validator::make( $request->all(),
                                      [ 'email'                 => 'required|max:50|email|unique:users',
                                        'username'              => 'required|max:20|min:3|unique:users',
                                        'password'              => 'required|min:6',
                                        'password_confirmation' => 'required|same:password' ] );
        if ( $validator->fails() ) {
            return Redirect::to( '/auth/register' )->withErrors( $validator )
                           ->withInput();
        }

        return $validator;
    }


    
    public static function login()
    {
        $validator = Validator::make( Input::all(), [ 'email'    => 'required',
                                                      'password' => 'required' ] );
        if ( $validator->fails() ) {
            return Redirect::to( '/auth/login' )->withErrors( $validator )
                           ->withInput();
        }

        return $validator;
    }



    public static function changePassword()
    {
        $validator = Validator::make( Input::all(),
                                      [ 'old_password'   => 'required',
                                        'password'       => 'required|min:6',
                                        'password_again' => 'required|same:password' ] );
        if ( $validator->fails() ) {
            Redirect::to( '/auth/changepassword' )->withErrors( $validator );
        }

        return $validator;
    }



    public static function forgotPassword()
    {
        $validator = Validator::make( Input::all(),
                                      [ 'email' => 'required|email' ] );
        if ( $validator->fails() ) {
            return Redirect::to( '/auth/forgotpassword' )
                           ->withErrors( $validator )->withInput();
        }

        return $validator;
    }
}