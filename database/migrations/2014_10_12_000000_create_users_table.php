<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //   $table->uuid('id')->primary();
            $table->id();
            $table->enum('registration_type', array('INDIVIDUAL', 'CORPORATE'))->default('INDIVIDUAL');
            $table->string('image_path')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('gender')->nullable();
            //  $table->enum('gender', array('male', 'female', 'other'));
            $table->string('region')->default('Africa');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('tc_vkn')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('iban')->nullable();
            $table->string('category')->nullable();
            $table->string('currency')->nullable();
            $table->string('fx_rate')->nullable();

            $table->string('trade_name')->nullable();
            $table->string('company_type')->nullable();
            $table->string('mersis_no')->nullable();

            $table->string('registration_number')->nullable();
            $table->string('taxe_admin')->nullable();
            $table->string('taxe_number')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', array('user', 'manager', 'admin'))->default('user');
            $table->boolean('status')->default(0);
              $table->boolean('valid')->default(true);

            $table->boolean('approved')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};