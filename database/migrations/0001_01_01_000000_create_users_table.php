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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_type');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('user_membership', function (Blueprint $table) {
            $table->id('userMem_ID');
            $table->string('membership_type', length: 255);
            $table->string('membership_plan', length: 255);
            $table->string('membership_desc', length: 255);
            $table->date('start_date');
            $table->date('expiry_date');
            $table->date('next_payment');
            $table->boolean('payment_status');
            $table->string('Trainer', length: 255);
            $table->timestamps();
        });
        Schema::create('milestone_details', function (Blueprint $table) {
            $table->id('milestone_ID');
            $table->string('milestoneName', length: 255);
            $table->string('milestoneDetails', length: 1000);
            $table->string('repetitions', length: 255);
            $table->string('weight_increment', length: 255);
            $table->string('goal', length: 255);
            $table->timestamps();
        });
        //tables with foreign keys(FK)
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id('profile_ID');
            $table->string('firstName', length: 255);
            $table->string('lastName', length: 255);
            $table->string('profileBio', length: 500);
            $table->string('contactDetails', length: 11);
            $table->date('birthdate');
            $table->string('address_num', length: 255);
            $table->string('address_street', length: 255);
            $table->string('address_city', length: 255);
            $table->string('address_region', length: 255);
            $table->timestamps();
            $table->foreignId('user_ID')->constrained('users', 'id');
            $table->foreignId('userMem_ID')->constrained('user_membership', 'userMem_ID');
        });
        Schema::create('user_milestones', function (Blueprint $table) {
            $table->id('userMilestone_ID');
            $table->timestamps();
            $table->float('currentProgress');
            $table->boolean('status');
            $table->boolean('checked_in');
            $table->foreignId('profile_ID')->constrained('user_profile', 'profile_ID');

        });
        Schema::create('user_assessment', function (Blueprint $table) {
            $table->id('userAsses_ID');
            $table->foreignId('profile_ID')->constrained('user_profile', 'profile_ID');
            $table->decimal('height', 5, 2)->default(0);
            $table->decimal('weight', 6, 2)->default(0);
            $table->decimal('bmi', 5, 2)->default(0);
            $table->string('bmi_classification', length: 255);
            $table->string('medical_history', length: 999);
            $table->boolean('hasIllness');
            $table->boolean('hasInjuries');
            $table->timestamps();
        });
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
    }
};
