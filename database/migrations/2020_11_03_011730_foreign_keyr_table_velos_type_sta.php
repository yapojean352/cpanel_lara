<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyrTableVelosTypeSta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Velos', function (Blueprint $table) {
            //
             //creation de la cle etrangere mettre  a jour
             $table->foreign('status_id')->references('id')->on('status')
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
            $table->dropColumn('status_id');
        });
    }
}
