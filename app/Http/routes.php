<?php
// ReadOnlyController
get( 'read-only/{id}', 'ReadOnlyController@show' );
get( '/', 'ReadOnlyController@index' );
// Auth
Route::controllers( [ 'auth' => 'Auth\AuthSin', ] );
get( 'info', 'InfoController@info' );
// PasteController
get( 'paste/{id}', 'PasteController@createNewStep' );
get( 'paste/delete/{id}', 'PasteController@delete' );
get( 'paste/delete-headline/{id}', 'PasteController@deleteHeadline' );
get( 'paste/update-headline/{id}', 'PasteController@updateHeadline' );
get( '/search/', [ 'as'   => 'searchHeadlines',
                   'uses' => 'ReadOnlyController@search' ] );
get( '/search-mypasteos/', 'PasteController@searchMyPasteos' );
// PasteosController
resource( 'pasteos', 'PasteosController' );
