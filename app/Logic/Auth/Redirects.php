<?php
namespace App\Logic\Auth;

use App\Logic\Traits\FlashMessage;
use Illuminate\Support\Facades\Redirect;

class Redirects
{

    use FlashMessage;



    public static function postRegister( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessageImportant( 'Your account was created! We send you activation mail.' ) );
        }

        return Redirect::to( '/auth/register' )
                       ->with( self::flashMessageImportant( 'We did\'t created your account.' ) );
    }



    public static function getActivate( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'Your account was activated. Now you can log in.' ) );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessageImportant( 'We did\'t activated your account. Try later.' ) );
    }



    public static function postLogin( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/pasteos' );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessageImportant( 'Email/Password combination are wrong, or you did\'t activate your account!' ) );
    }



    public static function getChangePassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessageImportant( 'You must be loged in to change your password.' ) );
        }

        return null;
    }



    public static function postChangePassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/' )
                           ->with( self::flashMessage( 'Your password are changed.' ) );
        }

        return Redirect::to( '/auth/changepassword' )
                       ->with( self::flashMessage( 'There is a problem. Your records does\'t match records from database!' ) );
    }



    public static function postForgotPassword( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'We send you new password.' ) );
        }

        return Redirect::to( '/auth/forgotpassword' )
                       ->with( self::flashMessage( 'Email you enter does\'t match records in database.' ) );
    }



    public static function getRecover( $true = true )
    {
        if ( $true == true ) {
            return Redirect::to( '/auth/login' )
                           ->with( self::flashMessage( 'You reset password successfully. You can now log in with new password from your email!' ) );
        }

        return Redirect::to( '/auth/login' )
                       ->with( self::flashMessage( 'We did\'t recover your account!' ) );
    }
}