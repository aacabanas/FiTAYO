<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToUserAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_assessment', function (Blueprint $table) {
            $table->boolean('physically_fit')->default(0);
            $table->boolean('operation')->default(0);
            $table->boolean('high_blood')->default(0);
            $table->boolean('heart_problem')->default(0);
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_assessment', function (Blueprint $table) {
            $table->dropColumn('physically_fit');
            $table->dropColumn('operation');
            $table->dropColumn('high_blood');
            $table->dropColumn('heart_problem');
            $table->dropColumn('emergency_contact_name');
            $table->dropColumn('emergency_contact_num');
        });
    }
}