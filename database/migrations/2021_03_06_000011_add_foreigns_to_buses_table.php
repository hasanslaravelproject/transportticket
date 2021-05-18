<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buses', function (Blueprint $table) {
            $table
                ->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table
                ->foreign('bus_category_id')
                ->references('id')
                ->on('bus_categories');

            $table
                ->foreign('seat_class_id')
                ->references('id')
                ->on('seat_classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buses', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['bus_category_id']);
            $table->dropForeign(['seat_class_id']);
        });
    }
}
