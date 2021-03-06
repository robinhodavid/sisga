<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdsColumnsToSgaborsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sgabors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id_ciclo')->nullable()->after('obser');
            $table->integer('id_finca')->unsigned()->after('id_ciclo');
            $table->foreign('id_finca')->references('id_finca')->on('sgfincas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sgabors', function (Blueprint $table) {
            $table->dropForeign('sgabors_id_finca_foreign');
            $table->dropColumn('id_finca');
            $table->dropColumn('id_ciclo');
        });
    }
}
