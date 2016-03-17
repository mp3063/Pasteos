<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePasteosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'pasteos', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->integer( 'headlines_id' )->unsigned();
            $table->string( 'step_description', 1024 )->index();
            $table->string( 'code', 2048 );
            $table->timestamps();
        } );
        Schema::table( 'pasteos', function ( Blueprint $table ) {
            $table->foreign( 'headlines_id' )->references( 'id' )
                  ->on( 'headlines' )->onUpdate( 'cascade' )
                  ->onDelete( 'cascade' );
        } );
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'pasteos' );
    }
}
