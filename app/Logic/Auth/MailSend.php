<?php
namespace App\Logic\Auth;

use Mail;
use URL;

class MailSend
{

    public static function register( $user )
    {
        Mail::queue( 'emails.auth.activate',
                     [ 'link'     => URL::to( '/auth/activate', $user->code ),
                       'username' => $user->username ],
            function ( $message ) use ( $user ) {
                $message->to( $user->email, $user->username )
                    ->subject( 'Activate your account!' );
            } );
    }



    public static function forgotPassword( $user, $password )
    {
        Mail::queue( 'emails.auth.forgot',
                     [ 'link'     => URL::to( '/auth/recover', $user->code ),
                       'username' => $user->username,
                       'password' => $password ],
            function ( $message ) use ( $user ) {
                $message->to( $user->email, $user->username )
                    ->subject( 'Your new password!' );
            } );
    }
}