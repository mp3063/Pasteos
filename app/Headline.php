<?php
namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Headline extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table    = 'headlines';
    protected $fillable = [ 'user_id', 'headline', 'description' ];


    protected $sluggable = array(
        'build_from' => 'headline',
        'save_to'    => 'slug',
        'on_update'  => true,
    );

    public function user()
    {
        return $this->belongsTo( 'App\User' );
    }



    public function pasteos()
    {
        return $this->hasMany( 'App\Pasteos', 'headlines_id', 'id' );
    }



    public static function userHeadlines()
    {
        if ( Auth::check() ) {
            return Auth::user()->headline;
        }
    }



    public static function findUserHeadlineBySlug( $slug )
    {
        $headline = Headline::whereSlug( $slug )->first();
        if ( Auth::check() ) {
            if ( Auth::id() == $headline->user_id ) {
                return $headline;
            }
        }

        return false;
    }

    public static function findUserHeadlineById( $id )
    {
        $headline = Headline::find( $id );
        if ( Auth::check() ) {
            if ( Auth::id() == $headline->user_id ) {
                return $headline;
            }
        }

        return false;
    }
}
