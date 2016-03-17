<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeadlinesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'headlines', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'user_id' )->unsigned();
            $table->string( 'headline', 100 )->index();
            $table->string( 'description', 1024 )->index();
            $table->timestamps();
        } );
        Schema::table( 'headlines', function ( Blueprint $table ) {
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )
                  ->onDelete( 'cascade' )->onUpdate( 'cascade' );
        } );
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'headlines' );
    }
}
