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
            $table->string('centre_name', 64)->nullable();
            $table->string('username', 16)->unique();
            $table->string('password', 65);
            $table->string('name', 64)->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('email',64)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('address')->nullable();
            $table->enum('position', ['manager', 'officer', 'tester', 'patient'])->nullable();
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
