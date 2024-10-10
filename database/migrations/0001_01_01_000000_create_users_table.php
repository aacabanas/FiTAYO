<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    private function tables(){
        return [
            "user_bmi","MilestoneProgress","nonmembers","checkins","trainers","users","user_membership","user_milestones","user_profile","user_assessment","password_reset_tokens","sessions"
        ];
    }
    public function up(): void
    {   
        Schema::create("user_bmi",function(Blueprint $table){
            $table->id();
            $table->string('username');
            $table->decimal('height', 5, 2);
            $table->decimal('weight', 6, 2);
            $table->decimal('bmi', 5, 2);
            $table->string('bmi_classification', length: 255);
            $table->date('date');
            $table->timestamps();
        });
        Schema::create('MilestoneProgress',function(Blueprint $table){
            $table->id();
            $table->string('lift');
            $table->integer('reps');
            $table->string('username');
            $table->string('status')->default("pending");
            $table->timestamps();
            $table->date('date');
            $table->string('action');
            $table->time('request_time');            
        });
        Schema::create('nonmembers',function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('date');
            $table->time('time_in');
        });
        Schema::create('checkins',function(Blueprint $table){
            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->string('username');
            $table->date('date');
            $table->time('time_in');
            $table->time('time_out')->nullable();
        });
        Schema::create('trainers',function(Blueprint $table ){
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('specialty')->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->integer('trainee_count')->default(0);
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('user_type')->default('user');
            $table->string('resetToken',length:128);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('payment_status')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('user_membership', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('membership_plan', length: 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('next_payment')->nullable();
            $table->string('Trainer', length: 255)->nullable();
            $table->timestamps();
        });
        
        Schema::create('user_milestones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();//do not remove
            $table->string('username');
            $table->string('lift');
            $table->integer('reps');
            $table->integer('weight');
            $table->date('date');

        });
        
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->string("profile_image")->default("images/blankprofile.png");
            $table->string('firstName', length: 255)->nullable();
            $table->string('lastName', length: 255)->nullable();
            $table->string('profileBio', length: 500)->nullable();
            $table->string("contact_prefix")->default("+63");
            $table->string('contactDetails', length: 11)->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('age')->nullable();
            $table->string('address_street_num', length: 255)->nullable();
            $table->string('address_barangay', length: 255)->nullable();
            $table->string('address_city', length: 255)->nullable();
            $table->string('username')->unique();
            $table->string('address_region', length: 255)->nullable();
            $table->timestamps();
        });
        
        Schema::create('user_assessment', function (Blueprint $table) {
            $table->id();
            $table->string('medical_history', length: 999)->nullable();
            $table->boolean('physically_fit')->nullable();
            $table->boolean('operation')->nullable();
            $table->boolean('high_blood')->nullable();
            $table->boolean('heart_problem')->nullable();
            $table->string("emergency_contact_name")->nullable();
            $table->string('username')->unique();
            $table->string('emergency_contact_num','11')->nullable();
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
        foreach([
            "user_bmi","MilestoneProgress","nonmembers","checkins","trainers","users","user_membership","user_milestones","user_profile","user_assessment","password_reset_tokens","sessions"
        ] as $t){
            Schema::dropIfExists($t);
        }
    }
};