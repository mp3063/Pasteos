<?php
namespace App\Http\Controllers;

use App\Headline;
use App\Http\Requests;
use Illuminate\Http\Request;

class ReadOnlyController extends Controller
{

    public function index()
    {
        return view( 'home' );
    }



    public function show( $slug )
    {
        $headline = Headline::whereSlug( $slug )->first();
        $articles = $headline->pasteos;

        return view( 'read-only-show', compact( 'headline', 'articles' ) );
    }



    public function search( Request $request )
    {
        $search = "%" . $request->input( 'search' ) . "%";
        $headline = Headline::where( 'headline', 'like', $search )
                            ->orWhere( 'description', 'like', $search )->get();

        return view( 'search', compact( 'headline' ) );
    }
}
