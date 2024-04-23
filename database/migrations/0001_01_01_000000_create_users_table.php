<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("users", function (Blueprint $table) {
            $table->id('user_ID');
            $table->string('username', length: 16);
            $table->string('password');
            $table->string('user_email', length: 320)->unique();
            $table->string('user_type', length: 16);
            $table->string('firstName', length: 255);
            $table->string('lastName', length: 255);
            $table->string('profileBio', length: 500);
            $table->string('contactDetails', length: 11);
            $table->date('birthdate');
            $table->string('address_num', length: 255);
            $table->string('address_street', length: 255);
            $table->string('address_city', length: 255);
            $table->string('address_region', length: 255);
            $table->decimal('height', 5, 2)->default(0);
            $table->decimal('weight', 6, 2)->default(0);
            $table->decimal('bmi', 5, 2)->default(0);
            $table->string('bmi_classification', length: 255);
            $table->string('medical_history', length: 999);
            $table->boolean('hasIllness');
            $table->boolean('hasInjuries');
            $table->string('membership_type', length: 255);
            $table->string('membership_desc', length: 255);
            $table->date('start_date');
            $table->date('expiry_date');
            $table->date('next_payment');
            $table->boolean('payment_status');
            $table->string('Trainer', length: 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
        //tables without foreign keys(FK)
        //Schema::create('user_credentials', function (Blueprint $table) {
        //    $table->id('user_ID');
        //    $table->string('username', length: 16);
        //    $table->string('password');
        //    $table->string('user_email', length: 320)->unique();
        //    $table->string('user_type', length: 16);
        //    $table->timestamp('email_verified_at')->nullable();
        //    $table->timestamps();
        //    $table->rememberToken();
        //});
        //Schema::create('user_membership', function (Blueprint $table) {
        //    $table->id('userMem_ID');
        //    $table->string('membership_type', length: 255);
        //    $table->string('membership_desc', length: 255);
        //    $table->date('start_date');
        //    $table->date('expiry_date');
        //    $table->date('next_payment');
        //    $table->boolean('payment_status');
        //    $table->string('Trainer', length: 255);
        //});
        Schema::create('milestone_details', function (Blueprint $table) {
            $table->id('milestone_ID');
            $table->string('milestoneName', length: 255);
            $table->string('milestoneDetails', length: 1000);
            $table->string('repetitions', length: 255);
            $table->string('weight_increment', length: 255);
            $table->string('goal', length: 255);
        });
        //tables with foreign keys(FK)
        //Schema::create('user_profile', function (Blueprint $table) {
        //    $table->id('profile_ID');
        //    $table->string('firstName', length: 255);
        //    $table->string('lastName', length: 255);
        //    $table->string('profileBio', length: 500);
        //    $table->string('contactDetails', length: 11);
        //    $table->date('birthdate');
        //    $table->string('address_num', length: 255);
        //    $table->string('address_street', length: 255);
        //    $table->string('address_city', length: 255);
        //    $table->string('address_region', length: 255);
        //    $table->foreignId('user_ID');
        //    $table->foreignId('userMem_ID');
        //    $table->foreign('user_ID')->references('user_ID')->on('user_credentials')->onDelete('cascade');
        //    $table->foreign('userMem_ID')->references('userMem_ID')->on('user_membership')->onDelete('cascade');
        //});
        Schema::create('user_milestones', function (Blueprint $table) {
            $table->id('userMilestone_ID');
            $table->time('date_created')->default(date('H:i:s'));
            $table->time('date_modified')->default(date('H:i:s'));
            $table->float('currentProgress');
            $table->boolean('status');
            $table->boolean('checked_in');
            $table->foreignId('profile_ID');
            $table->foreign('profile_ID')->references('user_ID')->on('users')->onDelete('cascade');

        });
        //Schema::create('user_assessment', function (Blueprint $table) {
        //    $table->id('userAsses_ID');
        //    $table->foreignId('profile_ID');
        //    $table->foreign('profile_ID')->references('profile_ID')->on('user_profile')->onDelete('cascade');
        //    $table->decimal('height', 5, 2)->default(0);
        //    $table->decimal('weight', 6, 2)->default(0);
        //    $table->decimal('bmi', 5, 2)->default(0);
        //    $table->string('bmi_classification', length: 255);
        //    $table->string('medical_history', length: 999);
        //    $table->boolean('hasIllness');
        //    $table->boolean('hasInjuries');
        //    $table->time('date_created')->default(date('H:i:s'));
        //    $table->time('date_modified')->default(date('H:i:s'));
        //});
        //laravel auto generated
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        //Schema::dropIfExists('user_assessment');
        Schema::dropIfExists('user_milestones');
        //Schema::dropIfExists('user_profile');
        //Schema::dropIfExists('user_credentials');
        //Schema::dropIfExists('user_membership');
        Schema::dropIfExists('milestone_details');
        
    }
};
