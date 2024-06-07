<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToUserMembershipTable extends Migration
{
    public function up()
    {
        Schema::table('user_membership', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('userMem_ID');
        });
    }

    public function down()
    {
        Schema::table('user_membership', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}

