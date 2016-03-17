<?php
namespace App\Logic\Traits;

use Auth;

trait MailConfig
{

    public static function config()
    {
        if ( Auth::check() ) {
            $user = Auth::user();

            return [ $user->email, $user->username ];
        } else {
            return [ 'predigrabend@gmail.com', 'Predigra' ];
        }
    }
}