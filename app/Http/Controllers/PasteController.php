<?php
namespace App\Http\Controllers;

use App\Headline;
use App\Http\Requests;
use App\Http\Requests\CreateNewStepRequest;
use App\Http\Requests\UpdateHeadlineRequest;
use App\Pasteos;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class PasteController extends Controller
{

    /**
     * PasteController constructor.
     */
    public function __construct()
    {
        return $this->middleware( 'auth' );
    }



    public function createNewStep( CreateNewStepRequest $request, $id )
    {
        $headline = Headline::find( $id );
        $articles = $headline->pasteos;
        $pasteos = Pasteos::create( [ 'headlines_id'     => $request->input( 'headlines_id' ),
                                      'step_description' => $request->input( 'step_description' ),
                                      'code'             => $request->input( 'code' ) ] );

        return Redirect::back()->with( compact( 'articles', 'pasteos' ) );
    }



    public function delete( $id )
    {
        Pasteos::destroy( $id );

        return Redirect::back();
    }



    public function searchMyPasteos( Request $request )
    {
        $search = "%" . $request->input( 'search-mypasteos' ) . "%";
        if ( Auth::check() ) {
            $headlines = Auth::user()->headline()
                             ->where( 'headline', 'like', $search )
                             ->orWhere( 'description', 'like', $search )->get();
        }

        return view( 'searchMyPasteos', compact( 'headlines' ) );
    }



    public function deleteHeadline( $id )
    {
        $headline = Headline::findUserHeadlineById( $id );
        if ( $headline != false ) {
            $headline->delete();

            return Redirect::back()->with( 'flash_message',
                                           'Successfully deleted headline and all steps associated with them!' );
        }

        return Redirect::back()->with( 'flash_message',
                                       'There is a problem! You don\'t have permission to delete this headline!' );
    }



    public function updateHeadline( UpdateHeadlineRequest $request, $id )
    {
        $headline = Headline::findUserHeadlineById( $id );
        if ( $headline !== false ) {
            $headline->update( [ 'headline'    => $request->get( 'headline' ),
                                 'description' => $request->get( 'description' ) ] );
            $redirect = 'pasteos/' . $headline->slug;

            return redirect( $redirect );
        }

        return Redirect::back()->with( 'flash_message',
                                       'There is a problem updating your headline!' );
    }
}
