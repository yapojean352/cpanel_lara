<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyrTableVelosTypeVelos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Velos', function (Blueprint $table) {
             //creation de la cle etrangere mettre  a jour
             $table->foreign('typeVelos_id')->references('id')->on('type_velos')
             ->onDelete('restrict')
             ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('velos', function (Blueprint $table) {
            //
            $table->dropColumn('typeVelos_id');
        });
    }
}
