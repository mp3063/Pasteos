<?php
namespace App\Logic\Auth;

class Messages
{

    public static function register()
    {
        return [ 'required' => 'Polje :attribute je obavezno i morate ga popuniti',
                 'max'      => 'Maximalno :values karaktera',
                 'min'      => ':attribute mora da sadrži minimalno :values karaktera',
                 'same'     => ':attribute i password moraju da budu isti' ];
    }



    public static function login()
    {
        return [ 'required' => 'Polje :attribute je obavezno i morate ga popuniti' ];
    }



    public static function changePassword()
    {
        return [ 'required' => 'Polje :attribute je obavezno i morate ga popuniti',
                 'min'      => ':attribute mora da sadrži minimalno :values karaktera',
                 'same'     => ':attribute i :values moraju da budu isti' ];
    }



    public static function forgotPassword()
    {
        return [ 'required' => 'Polje :attribute je obavezno i morate ga popuniti' ];
    }
}