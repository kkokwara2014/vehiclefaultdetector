<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFaultIdToSolutionreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solutionreviews', function (Blueprint $table) {
            $table->unsignedInteger('fault_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solutionreviews', function (Blueprint $table) {
            $table->dropColumn('fault_id');
        });
    }
}
