<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddUserIdToUserMembershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_membership', function (Blueprint $table) {
            if (!Schema::hasColumn('user_membership', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('userMem_ID');
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
        Schema::table('user_membership', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
