<?php
namespace App\Logic\Traits;

use Illuminate\Support\Facades\Session;

trait FlashMessage
{

    public static function flashMessage( $message )
    {
        return Session::flash( 'flash_message', $message );
    }



    public static function flashMessageImportant( $message )
    {
        return Session::flash( 'flash_message_important', $message );
    }
}