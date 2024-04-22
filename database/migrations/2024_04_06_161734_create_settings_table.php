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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('MRIC');
            $table->text('description');
            $table->string('keywords')->default('MRIC');
            $table->string('email',30)->nullable();
            $table->string('phone',14)->nullable();
            $table->string('fb')->nullable();
            $table->string('x')->nullable();
            $table->string('ig')->nullable();
            $table->string('li')->nullable();
            $table->string('address')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
