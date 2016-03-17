<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasteos extends Model
{

    protected $table    = 'pasteos';
    protected $fillable = [ 'headlines_id', 'step_description', 'code' ];



    public function headline()
    {
        return $this->belongsTo( 'App\Headline', 'headlines_id', 'id' );
    }



    public static function headlinePasteos( $id )
    {
        $headlines = Headline::userHeadlines();
        $pasteos = Pasteos::find( $id );
        foreach ( $headlines as $headline ) {
            if ( $headline->id == $pasteos->headlines_id ) {
                $head[] = $pasteos;
            }
        }

        return false;
    }
}
