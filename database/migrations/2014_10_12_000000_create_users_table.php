<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('join_date')->nullable();
            $table->string('employee_id');
            $table->string('mobile_no')->nullable();
            $table->longText('profile_image')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->integer('department_id');
            $table->integer('designtion_id');
            $table->integer('user_level');
            $table->boolean('is_active');
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
}
