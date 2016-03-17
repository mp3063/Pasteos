<?php
namespace App\Logic\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class Credentials
{

    public static function register()
    {
        return [ 'email'    => Input::get( 'email' ),
                 'username' => Input::get( 'username' ),
                 'password' => Hash::make( Input::get( 'password' ) ),
                 'code'     => str_random( 60 ),
                 'active'   => 0 ];
    }



    public static function login()
    {
        return [ 'email'    => Input::get( 'email' ),
                 'password' => Input::get( 'password' ),
                 'active'   => 1 ];
    }



    public static function getRegister( $code )
    {
        $user = User::where( 'code', '=', $code )->where( 'active', '=', 0 )
                    ->first();
        if ( $user ) {
            $user->update( [ 'active' => 1, 'code' => '' ] );

            return true;
        }

        return false;
    }



    public static function postChangePassword()
    {
        $user = User::find( Auth::user()->id );
        if ( Hash::check( Input::get( 'old_password' ),
                          $user->getAuthPassword() )
        ) {
            $user->update( [ 'password' => Hash::make( Input::get( 'password' ) ) ] );

            return true;
        }

        return false;

    }



    public static function postForgotPassword()
    {
        $user = User::where( 'email', '=', Input::get( 'email' ) )->first();
        if ( $user ) {
            $password = str_random( 10 );
            $code = str_random( 60 );
            $user->update( [ 'code'          => $code,
                             'password_temp' => Hash::make( $password ) ] );

            return [ $user, $password ];
        }

        return false;
    }



    public static function getRecover( $code )
    {
        $user = User::where( 'code', '=', $code )
                    ->where( 'password_temp', '!=', '' )->first();
        if ( $user ) {
            $user->update( [ 'password'      => $user->password_temp,
                             'password_temp' => '',
                             'code'          => '' ] );

            return true;
        }

        return false;
    }
}