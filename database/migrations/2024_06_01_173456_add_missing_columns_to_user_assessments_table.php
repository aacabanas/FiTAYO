<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_assessment', function (Blueprint $table) {
            if (!Schema::hasColumn('user_assessment', 'physically_fit')) {
                $table->boolean('physically_fit')->default(0);
            }
            if (!Schema::hasColumn('user_assessment', 'operation')) {
                $table->boolean('operation')->default(0);
            }
            if (!Schema::hasColumn('user_assessment', 'high_blood')) {
                $table->boolean('high_blood')->default(0);
            }
            if (!Schema::hasColumn('user_assessment', 'heart_problem')) {
                $table->boolean('heart_problem')->default(0);
            }
            if (!Schema::hasColumn('user_assessment', 'emergency_contact_name')) {
                $table->string('emergency_contact_name')->nullable();
            }
            if (!Schema::hasColumn('user_assessment', 'emergency_contact_num')) {
                $table->string('emergency_contact_num')->nullable();
            }
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
            if (Schema::hasColumn('user_assessment', 'physically_fit')) {
                $table->dropColumn('physically_fit');
            }
            if (Schema::hasColumn('user_assessment', 'operation')) {
                $table->dropColumn('operation');
            }
            if (Schema::hasColumn('user_assessment', 'high_blood')) {
                $table->dropColumn('high_blood');
            }
            if (Schema::hasColumn('user_assessment', 'heart_problem')) {
                $table->dropColumn('heart_problem');
            }
            if (Schema::hasColumn('user_assessment', 'emergency_contact_name')) {
                $table->dropColumn('emergency_contact_name');
            }
            if (Schema::hasColumn('user_assessment', 'emergency_contact_num')) {
                $table->dropColumn('emergency_contact_num');
            }
        });
    }
}