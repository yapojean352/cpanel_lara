<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyrTableVelosTypeStatus extends Migration
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
             $table->foreign('users_id')->references('id')->on('users')
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
        });
    }
}
