<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableVelos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Velos', function (Blueprint $table) {
            // mise a jour
            $table->integer('users_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('typeVelos_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Velos', function (Blueprint $table) {
            //
            $table->dropColumn('users_id');
            $table->dropColumn('status_id');
            $table->dropColumn('typeVelos_id');
        });
    }
}
