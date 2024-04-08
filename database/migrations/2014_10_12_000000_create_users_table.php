<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender',array('M','F'))->default('M');
            $table->string('fb_url')->nullable();
            $table->string('tw_url')->nullable();
            $table->string('insta_url')->nullable();
            $table->string('activation_token')->nullable();
            $table->enum('status',array('0','1'))->default('0');
            $table->enum('role',array('a','b','c'))->default('c');
            $table->string('occupation')->nullable();
            $table->string('org')->nullable();
            $table->string('username')->nullable();
            $table->enum('activated',array('0','1'))->default('0');
            $table->string('image_link')->nullable();
            $table->text('bio')->nullable();
            $table->float('total_contribution')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('year')->nullable();
            $table->enum('verified',array('0','1'))->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
