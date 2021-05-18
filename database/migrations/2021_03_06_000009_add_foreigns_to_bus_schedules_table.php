<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToBusSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bus_schedules', function (Blueprint $table) {
            $table
                ->foreign('bus_id')
                ->references('id')
                ->on('buses');

            $table
                ->foreign('bus_route_id')
                ->references('id')
                ->on('bus_routes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bus_schedules', function (Blueprint $table) {
            $table->dropForeign(['bus_id']);
            $table->dropForeign(['bus_route_id']);
        });
    }
}
