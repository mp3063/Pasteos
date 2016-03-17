<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Logic\Auth\Credentials;
use App\Logic\Auth\MailSend;
use App\Logic\Auth\Redirects;
use App\Logic\Traits\FlashMessage;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Validator;
use View;

class AuthSin extends Controller
{

    use FlashMessage;



    public function getRegister()
    {
        return View::make( 'auth.register' );
    }



    public function postRegister( Request $request )
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
        $user = User::create( Credentials::register() );
        if ( $user ) {
            MailSend::register( $user );

            return Redirects::postRegister();
        }

        return Redirects::postRegister( false );
    }



    public function getActivate( $code )
    {
        if ( Credentials::getRegister( $code ) ) {
            return Redirects::getActivate();
        }

        return Redirects::getActivate( false );
    }



    public function postLogin()
    {
        $validator = Validator::make( Input::all(), [ 'email'    => 'required',
                                                      'password' => 'required' ] );
        if ( $validator->fails() ) {
            return Redirect::to( '/auth/login' )->withErrors( $validator )
                           ->withInput();
        }
        $remember = Input::has( 'remember' ) ? true : false;
        $auth = Auth::attempt( Credentials::login(), $remember );
        if ( $auth ) {
            return Redirects::postLogin();
        }

        return Redirects::postLogin( false );
    }



    public function getLogin()
    {
        return View::make( '/auth/login' );
    }



    public function getLogout()
    {
        Auth::logout();

        return Redirect::to( '/auth/login' );
    }



    public function getChangepassword()
    {
        if ( Auth::check() ) {
            return View::make( '/auth/changepassword' );
        }

        return Redirects::getChangePassword();
    }



    public function postChangepassword()
    {
        $validator = Validator::make( Input::all(),
                                      [ 'old_password'   => 'required',
                                        'password'       => 'required|min:6',
                                        'password_again' => 'required|same:password' ] );
        if ( $validator->fails() ) {
            Redirect::to( '/auth/changepassword' )->withErrors( $validator );
        }
        if ( Credentials::postChangePassword() ) {
            return Redirects::postChangePassword();
        }

        return Redirects::postChangePassword( false );
    }



    public function getForgotpassword()
    {
        return View::make( '/auth/forgotpassword' );
    }



    public function postForgotpassword()
    {
        $validator = Validator::make( Input::all(),
                                      [ 'email' => 'required|email' ] );
        if ( $validator->fails() ) {
            return Redirect::to( '/auth/forgotpassword' )
                           ->withErrors( $validator )->withInput();
        }
        list( $user, $password ) = Credentials::postForgotPassword();
        if ( $user ) {
            MailSend::forgotPassword( $user, $password );

            return Redirects::postForgotPassword();
        }

        return Redirects::postForgotPassword( false );
    }



    public function getRecover( $code )
    {
        if ( Credentials::getRecover( $code ) ) {
            return Redirects::getRecover();
        }

        return Redirects::getRecover( false );
    }
}