<?php
namespace App\Http\Controllers;

use App\Http\Requests;

class InfoController extends Controller
{

    public function info()
    {
        return view( 'info' );
    }
}
