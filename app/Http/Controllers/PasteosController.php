<?php
namespace App\Http\Controllers;

use App\Headline;
use App\Http\Requests;
use App\Pasteos;
use Auth;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class PasteosController extends Controller
{

    /**
     * PasteosController constructor.
     */
    public function __construct()
    {
        return $this->middleware( 'auth' );
    }



    public function index()
    {
        $user = Auth::user();
        $headline = $user->headline()->paginate( 100 );

        return view( 'mypasteos', compact( 'user', 'headline' ) );

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Redirect
     */
    public function store( Request $request )
    {
        $user = Auth::user();
        $validation = Validator::make( $request->all(),
                                       [ 'headline'    => 'required',
                                         'description' => 'required', ] );
        if ( $validation->fails() ) {
            return Redirect::back()->with( 'flash_message',
                                           'All fields are required! "Headline" and "Description"' );
        }
        $headline = Headline::create( [ 'user_id'     => $user->id,
                                        'headline'    => $request->input( 'headline' ),
                                        'description' => $request->input( 'description' ) ] );

        return Redirect::to( "/pasteos/{$headline->slug}" );
    }



    /**
     * Display the specified resource.
     *
     * @param $slug
     *
     * @return \App\Http\Controllers\view
     * @internal param int $id
     *
     */
public function show( $slug )
    {
        $headline = Headline::findUserHeadlineBySlug( $slug );
        if ( $headline == false ) {
            return Redirect::to( '/read-only/' . $slug );
        }
        //        $headline = $headline->paginate( 1 );
        $articles = $headline->pasteos;

        return view( 'edit', compact( 'headline', 'articles' ) );
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int                     $id
     *
     * @return view
     */
    public function edit( Request $request, $id )
    {
        $headline = Headline::find( $id );
        $articles = $headline->pasteos;
        $validation = Validator::make( $request->all(),
                                       [ 'step_description' => 'required_without:code',
                                         'code'             => 'required_without:step_description', ] );
        if ( $validation->fails() ) {
            return Redirect::back()->with( 'flash_message',
                                           'One field is required! Either "Step description" or "Code"!' );
        }
        Pasteos::create( [ 'headlines_id'     => $request->input( 'headlines_id' ),
                           'step_description' => $request->input( 'step_description' ),
                           'code'             => $request->input( 'code' ) ] );

        return view( 'edit', compact( 'headline', 'articles' ) );
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     *
     * @param          $id
     *
     * @return redirect
     * @internal param int $id
     */
    public function update( Request $request, $id )
    {
        $pasteos = Pasteos::find( $id );
        $validation = Validator::make( $request->all(),
                                       [ 'step_description' => 'required_without:code',
                                         'code'             => 'required_without:step_description', ] );
        if ( $validation->fails() ) {
            return Redirect::back()->with( 'flash_message',
                                           'One field is required! Either "Step description" or "Code"!' );
        }
        $pasteos->update( [ 'step_description' => $request->input( 'step_description' ),
                            'code'             => $request->input( 'code' ) ] );

        return Redirect::back();
    }
}
